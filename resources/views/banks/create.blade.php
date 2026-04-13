@extends('layout')

@section('content')
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
<div class="max-w-xl mx-auto">

    <h2 class="text-xl font-semibold mb-4">🏦 Add New Bank Account</h2>

    <form method="POST" action="/banks" class="space-y-4">
        @csrf

        <!-- Bank Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Bank Name
            </label>
            <input
                type="text"
                name="name"
                placeholder="e.g. HDFC Bank"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Account Number -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Account Number
            </label>
            <input
                type="text"
                name="account_number"
                placeholder="Enter account number"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required
            >
            @error('account_number')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Opening Balance -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Opening Balance
            </label>
            <input
                type="number"
                step="0.01"
                name="current_balance"
                placeholder="0.00"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <!-- Submit -->
        <div class="flex justify-between items-center">
            <a href="/banks" class="text-gray-600 hover:underline">
                ← Back
            </a>

            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700 transition"
            >
                Save Bank
            </button>
        </div>

    </form>

</div>

@endsection