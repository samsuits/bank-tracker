<!DOCTYPE html>
<html>
<head>
    <title>Bank Tracker</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-5xl mx-auto">

    <h1 class="text-2xl font-bold mb-4">💰 Bank Tracker</h1>
    <div class="bg-blue-500 text-white p-4">
    Tailwind Working ✅
</div>

    <div class="mb-4 space-x-4">
        <a href="/banks" class="text-blue-600">Banks</a>
        <a href="/transactions" class="text-blue-600">Transactions</a>
        <a href="/transactions/create" class="text-blue-600">Add Transaction</a>
    </div>

    <div class="bg-white p-4 rounded shadow">
        @yield('content')
    </div>

</div>

</body>
</html>