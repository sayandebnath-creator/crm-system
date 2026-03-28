@extends('layouts.app')

@section('title', 'Edit Deal')

@section('content')

<div class="max-w-3xl mx-auto">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Edit Deal</h1>
        <p class="text-sm text-gray-500">Update deal details</p>
    </div>

    {{-- Card --}}
    <div class="bg-white shadow rounded-xl p-6">

        <form method="POST" action="{{ route('deals.update', $deal->id) }}">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-4">
                <label class="block text-sm mb-1">Deal Title</label>
                <input type="text" name="title"
                    value="{{ old('title', $deal->title) }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Amount --}}
            <div class="mb-4">
                <label class="block text-sm mb-1">Amount</label>
                <input type="number" name="amount"
                    value="{{ old('amount', $deal->amount) }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Customer --}}
            <div class="mb-4">
                <label class="block text-sm mb-1">Customer</label>
                <select name="customer_id"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ $deal->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Status --}}
            <div class="mb-6">
                <label class="block text-sm mb-1">Status</label>
                <select name="status"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="pending" {{ $deal->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="won" {{ $deal->status == 'won' ? 'selected' : '' }}>Won</option>
                    <option value="lost" {{ $deal->status == 'lost' ? 'selected' : '' }}>Lost</option>
                </select>
            </div>

            {{-- Actions --}}
            <div class="flex justify-between items-center">

                <a href="{{ route('deals.index') }}"
                   class="text-gray-500 hover:underline">
                   ← Back
                </a>

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                    Update Deal
                </button>

            </div>

        </form>

    </div>

</div>

@endsection