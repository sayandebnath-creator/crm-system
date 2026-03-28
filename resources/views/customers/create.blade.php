@extends('layouts.app')

@section('title', 'Create Customer')

@section('content')

<div class="max-w-2xl mx-auto">

<form method="POST" action="/customers" class="bg-white p-6 rounded-xl shadow space-y-5">
    @csrf

    <h2 class="text-xl font-semibold text-gray-800">Add New Customer</h2>

    <!-- Name -->
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Name
        </label>

        <input name="name" placeholder="e.g. John Doe"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email -->
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Email
        </label>

        <input name="email" type="email" placeholder="e.g. john@email.com"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Phone -->
    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Phone
        </label>

        <input name="phone" placeholder="e.g. 9876543210"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

        @error('phone')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Actions -->
    <div class="flex justify-between items-center pt-4">
        <a href="/customers" class="text-gray-500 hover:text-gray-700">
            Cancel
        </a>

        <button type="submit"
            class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:scale-[1.02]">
            Save Customer
        </button>
    </div>

</form>

</div>

@endsection