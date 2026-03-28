@extends('layouts.app')

@section('title', 'Create Deal')

@section('content')

<form method="POST" action="{{ route('deals.store') }}" class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow space-y-5">
    @csrf

    <h2 class="text-xl font-semibold text-gray-800">Create New Deal</h2>

    <!-- Customer -->
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Customer
        </label>

        <select name="customer_id"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            
            <option value="">Select Customer</option>

            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">
                    {{ $customer->name }}
                </option>
            @endforeach
        </select>

        @error('customer_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Title -->
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Deal Title
        </label>

        <input name="title" placeholder="e.g. Website Development"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Amount -->
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Amount (₹)
        </label>

        <input name="amount" type="number" placeholder="e.g. 5000"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        @error('amount')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Actions -->
    <div class="flex justify-between items-center pt-4">
        <a href="/deals" class="text-gray-500 hover:text-gray-700">
            Cancel
        </a>

        <button type="submit"
            class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-5 py-2 rounded-lg shadow hover:scale-[1.02]">
            Create Deal
        </button>
    </div>
</form>

@endsection