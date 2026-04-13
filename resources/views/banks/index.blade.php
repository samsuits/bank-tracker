@extends('layout')

@section('content')

<h2 class="text-lg font-semibold mb-3">Add Bank</h2>

<form method="POST" action="/banks" class="space-y-3 mb-6">
    @csrf

    <input class="border p-2 w-full" name="name" placeholder="Bank Name" required>
    <input class="border p-2 w-full" name="account_number" placeholder="Account Number" required>
    <input class="border p-2 w-full" name="current_balance" placeholder="Opening Balance">

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Add Bank
    </button>
</form>

<h2 class="text-lg font-semibold mb-3">All Banks</h2>

<table class="w-full border">
<tr class="bg-gray-200">
    <th class="p-2">Name</th>
    <th>Account</th>
    <th>Balance</th>
</tr>

@foreach($banks as $bank)
<tr class="border-t">
    <td class="p-2">{{ $bank->name }}</td>
    <td>{{ $bank->account_number }}</td>
    <td>₹{{ $bank->current_balance }}</td>
</tr>
@endforeach

</table>

@endsection