@extends('layouts.app')

@section('title', 'Customers')

@section('content')

<!-- Header -->
<div class="flex items-center justify-between mb-6">

    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Customers</h1>
        <p class="text-sm text-gray-500">Manage your customer relationships</p>
    </div>

<form method="GET" class="flex items-center gap-3">

    <div class="flex items-center gap-3">
        <input 
            type="text" 
            name="search"
            value="{{ request('search') }}"
            placeholder="Search customers..."
            class="border px-3 py-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button 
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm shadow">
            Search
        </button>

        <a href="/customers"
        class="border px-4 py-2 rounded-md text-sm">
            Reset
        </a>

        <a href="/customers/create"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm shadow">
            + Add Customer
        </a>
    </div>
</form>
</div>

<!-- Table Card -->
<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full text-sm">

        <!-- Head -->
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="p-4 text-left font-medium">Customer</th>
                <th class="text-left font-medium">Email</th>
                <th class="text-left font-medium">Phone</th>
                <th class="text-right font-medium pr-6">Actions</th>
            </tr>
        </thead>

        <!-- Body -->
        <tbody class="divide-y">

            @forelse($customers as $customer)
            <tr class="hover:bg-gray-50 transition">

                <!-- Customer -->
                <td class="p-4 flex items-center gap-3">

                    <!-- Avatar -->
                    <div class="w-9 h-9 bg-blue-100 text-blue-600 flex items-center justify-center rounded-full font-medium">
                        {{ strtoupper(substr($customer->name, 0, 1)) }}
                    </div>

                    <div>
                        <p class="font-medium text-gray-800">{{ $customer->name }}</p>
                        <p class="text-xs text-gray-500">Customer ID: #{{ $customer->id }}</p>
                    </div>

                </td>

                <!-- Email -->
                <td class="text-gray-700">
                    {{ $customer->email }}
                </td>

                <!-- Phone -->
                <td class="text-gray-600">
                    {{ $customer->phone ?? '-' }}
                </td>

                <!-- Actions -->
                <td class="text-right pr-6">

                    <div class="flex justify-end gap-2">

                        <!-- <a href="#"
                           class="text-blue-600 hover:underline text-sm">
                            View
                        </a> -->

                        <a href="{{route('customers.edit', $customer->id)}}"
                           class="text-gray-600 hover:underline text-sm">
                            Edit
                        </a>

                    </div>

                </td>

            </tr>

            @empty
            <tr>
                <td colspan="4" class="text-center py-10 text-gray-500">
                    No customers found. Start by adding one.
                </td>
            </tr>
            @endforelse

        </tbody>

    </table>

</div>

<!-- Pagination -->
<div class="mt-4">
    {{ $customers->links() }}
</div>

@endsection