<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Bank;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display all transactions
     */
    public function index()
    {
        $transactions = Transaction::with(['bank', 'category'])
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $banks = Bank::all();
        $categories = Category::all();

        return view('transactions.create', compact('banks', 'categories'));
    }

    /**
     * Store new transaction
     */
    public function store(Request $request)
    {
        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'category_id' => 'nullable|exists:categories,id',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'type' => 'required|in:credit,debit',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $bank = Bank::findOrFail($request->bank_id);

        // Calculate signed amount
        $signedAmount = $request->type === 'credit'
            ? $request->amount
            : -$request->amount;

        // New balance
        $newBalance = $bank->current_balance + $signedAmount;

        // Create transaction
        $transaction = Transaction::create([
            'bank_id' => $request->bank_id,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'description' => $request->description,
            'type' => $request->type,
            'amount' => $request->amount,
            'balance' => $newBalance,
        ]);

        // Update bank balance
        $bank->update([
            'current_balance' => $newBalance
        ]);

        return redirect('/transactions/create')
            ->with('success', 'Transaction added successfully')
            ->with('last_bank', $request->bank_id)
            ->with('last_date', $request->date)
            ->with('last_type',  $request->type)
            ->with('last_category', $request->category_id);
    }
}