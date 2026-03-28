<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Customer;

class DealController extends Controller
{
    public function index(Request $request)
    {
        $query = Deal::query();

            $query = Deal::query();

            // custom search filter
            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            // custom status filter
            if ($request->filled('status') && $request->status != 'all') {
                $query->where('status', $request->status);
            }

        $deals = $query->latest()->paginate(10); // Adjust pagination as needed
        return view('deals.index', compact('deals'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('deals.create', compact('customers'));
    }

    public function edit(Deal $deal)
    {
        // adding a custom edit for customers to select from dropdown
        $customers = Customer::all();
        return view('deals.edit', compact('deal', 'customers'));
    }

    public function update(Request $request, Deal  $deal)
    {
        $request->validate([
            'customer_id' => 'required',
            'title' => 'required',
            'amount' => 'required|numeric'
        ]);
        $deal->update([
            'title' => $request->title,
            'amount' => $request->amount,
            'status' => $request->status,
            'customer_id' => $request->customer_id,
        ]);
        return redirect()->route('deals.index')-> with('success', 'Deal updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'title' => 'required',
            'amount' => 'required|numeric'
        ]);
        Deal::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'status' => 'pending',
            'customer_id' => $request->customer_id,
        ]);
        return redirect()->route('deals.index')-> with('success', 'Deal created successfully.');
    }
}
