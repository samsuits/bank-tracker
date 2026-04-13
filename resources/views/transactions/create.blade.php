@extends('layout')

@section('content')

<h2 class="text-lg font-semibold mb-3">Add Transaction</h2>
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="/transactions" class="space-y-3">
    @csrf

    <select name="bank_id" class="border p-2 w-full">
        @foreach($banks as $bank)
            <option value="{{ $bank->id }}"
                {{ session('last_bank') == $bank->id ? 'selected' : '' }}>
                {{ $bank->name }} (₹{{ $bank->current_balance }})
            </option>
        @endforeach
    </select>

    <input
        type="date"
        name="date"
        value="{{ session('last_date') ?? date('Y-m-d') }}"
        class="border p-2 w-full"
        required
    >
    <input name="description" class="border p-2 w-full" placeholder="Description" required>

    <select name="type" class="border p-2 w-full">
        <option value="credit" {{ session('last_type') == 'credit' ? 'selected' : '' }}>Credit</option>
        <option value="debit" {{ session('last_type') == 'debit' ? 'selected' : '' }}>Debit</option>
    </select>

    <input name="amount" class="border p-2 w-full" placeholder="Amount" required>
    <select name="category_id" class="border p-2 w-full">
    <option value="">Select Category</option>

    @foreach($categories as $category)
        <option value="{{ $category->id }}"
            {{ session('last_category') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

    <button class="bg-green-500 text-white px-4 py-2 rounded">
        Save Transaction
    </button>
</form>

@endsection