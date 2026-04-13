@extends('layout')

@section('content')

<h2 class="text-lg font-semibold mb-3">Add Transaction</h2>

<form method="POST" action="/transactions" class="space-y-3">
    @csrf

    <select name="bank_id" class="border p-2 w-full">
        @foreach($banks as $bank)
            <option value="{{ $bank->id }}">
                {{ $bank->name }} (₹{{ $bank->current_balance }})
            </option>
        @endforeach
    </select>

    <input type="date" name="date" class="border p-2 w-full" required>
    <input name="description" class="border p-2 w-full" placeholder="Description" required>

    <select name="type" class="border p-2 w-full">
        <option value="credit">Credit</option>
        <option value="debit">Debit</option>
    </select>

    <input name="amount" class="border p-2 w-full" placeholder="Amount" required>
    <select name="category_id" class="border p-2 w-full">
    <option value="">Select Category</option>

    @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
</select>

    <button class="bg-green-500 text-white px-4 py-2 rounded">
        Save Transaction
    </button>
</form>

@endsection