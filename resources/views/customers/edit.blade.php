@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="max-w-3xl mx-auto">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Edit Customer</h1>
        <p class="text-sm text-gray-500">Update customer details</p>
    </div>

    {{-- Card --}}
    <div class="bg-white shadow rounded-xl p-6">

        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
            @csrf
            @method('PUT')

            {{-- Customer name --}}
            <div class="mb-4">
                <label class="block text-sm mb-1">Customer Name</label>
                <input type="text" name="name"
                    value="{{ old('name', $customer->name) }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-sm mb-1">Email</label>
                <input type="email" name="email"
                    value="{{ old('email', $customer->email) }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Phone --}}
            <div class="mb-4">
                <label class="block text-sm mb-1">Phone</label>
                <input type="text" name="phone"
                    value="{{ old('phone', $customer->phone) }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            {{-- Actions --}}
            <div class="flex justify-between items-center">

                <a href="{{ route('customers.index') }}"
                   class="text-gray-500 hover:underline">
                   ← Back
                </a>

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                    Update Customer
                </button>

            </div>

        </form>

    </div>

</div>

@endsection