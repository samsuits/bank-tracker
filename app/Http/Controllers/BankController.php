<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::latest()->get();
        return view('banks.index', compact('banks'));
    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'account_number' => 'required|unique:banks',
        ]);

        Bank::create($request->all());

        return redirect('/banks')->with('success', 'Bank added successfully');
    }
}
