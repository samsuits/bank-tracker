@extends('layout')

@section('content')

<h2 class="text-lg font-semibold mb-3">Transactions</h2>

<table class="w-full border">
<tr class="bg-gray-200">
    <th class="p-2">Date</th>
    <th>Bank</th>
    <th>Description</th>
    <th>Type</th>
    <th>Amount</th>
    <th>Category</th>
    <th>Balance</th>
</tr>

@foreach($transactions as $t)
<tr class="border-t">
    <td class="p-2">{{ $t->date }}</td>
    <td>{{ $t->bank->name }}</td>
    <td>{{ $t->description }}</td>
    <td class="{{ $t->type === 'credit' ? 'text-green-600' : 'text-red-600' }}">
    {{ ucfirst($t->type) }}
    </td>
    <td class="{{ $t->type === 'credit' ? 'text-green-600' : 'text-red-600' }}">₹{{ $t->amount }}</td>
    <td>{{ $t->category->name ?? '-' }}</td>
    <td>₹{{ $t->balance }}</td>
</tr>
@endforeach

</table>

@endsection