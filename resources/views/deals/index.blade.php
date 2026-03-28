@extends('layouts.app')

@section('title', 'Deals')

@section('content')

{{-- Header --}}
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-semibold">Deals</h1>
        <p class="text-sm text-gray-500">Manage and track all deals</p>
    </div>

    <a href="/deals/create"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
        + Add Deal
    </a>
</div>

{{-- Filters + Search --}}
<form method="GET" class="flex justify-between items-center mb-4">

    {{-- Left: Status Filters --}}
    <div class="flex gap-2">

        <a href="{{ route('deals.index') }}"
           class="px-3 py-1 text-sm rounded 
           {{ request('status') == null ? 'bg-gray-300' : 'bg-gray-200 hover:bg-gray-300' }}">
           All
        </a>

        <a href="{{ route('deals.index', ['status' => 'pending']) }}"
           class="px-3 py-1 text-sm rounded 
           {{ request('status') == 'pending' ? 'bg-yellow-200 text-yellow-800' : 'bg-yellow-100 text-yellow-700' }}">
           Pending
        </a>

        <a href="{{ route('deals.index', ['status' => 'won']) }}"
           class="px-3 py-1 text-sm rounded 
           {{ request('status') == 'won' ? 'bg-green-200 text-green-800' : 'bg-green-100 text-green-700' }}">
           Won
        </a>

    </div>

    {{-- Right: Search --}}
    <div class="flex gap-2">

        <input type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search deals..."
            class="border px-3 py-2 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        {{-- Preserve status --}}
        <input type="hidden" name="status" value="{{ request('status') }}">

        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
            Search
        </button>

    </div>

</form>

{{-- Table --}}
<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full text-sm">

    <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
        <tr>
            <th class="p-4 text-left">Title</th>
            <th class="text-left">Amount</th>
            <th class="text-left">Status</th>
            <th class="text-left">Action</th>
        </tr>
    </thead>

    <tbody>

        @forelse($deals as $deal)
        <tr class="border-t hover:bg-gray-50">

            {{-- Title --}}
            <td class="p-4 font-medium text-gray-800">
                {{ $deal->title }}
            </td>

            {{-- Amount --}}
            <td class="font-semibold text-green-600">
                ₹{{ number_format($deal->amount, 2) }}
            </td>

            {{-- Status --}}
            <td>
                <span class="px-3 py-1 text-xs rounded-full font-medium
                    {{ $deal->status == 'won' ? 'bg-green-100 text-green-700' : '' }}
                    {{ $deal->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                    {{ $deal->status == 'lost' ? 'bg-red-100 text-red-700' : '' }}
                ">
                    {{ ucfirst($deal->status) }}
                </span>
            </td>

            {{-- Action --}}
            <td>
                <!-- Edit option added as custom -->
                <a href="{{ route('deals.edit', $deal->id) }}"
                class="text-blue-600 hover:underline text-xs">
                    Edit
                </a>

                <span class="text-gray-300">|</span>

                @if($deal->status != 'won')
                <a href="/pay/{{ $deal->id }}"
                   class="inline-block bg-gradient-to-r from-green-500 to-green-600 
                          hover:from-green-600 hover:to-green-700 
                          text-white px-4 py-1.5 rounded-lg text-xs shadow">
                    Pay Now
                </a>
                @else
                <span class="text-xs text-gray-400">Completed</span>
                @endif
            </td>

        </tr>
        @empty

        {{-- Empty State --}}
        <tr>
            <td colspan="4" class="text-center py-10 text-gray-500">
                No deals found. Start by creating your first deal.
            </td>
        </tr>

        @endforelse

    </tbody>
</table>

</div>

<!-- Pagination -->
<div class="mt-4">
    {{ $deals->appends(request()->query())->links() }}
</div>

@endsection