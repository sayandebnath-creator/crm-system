<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Deal;
use App\Models\Payment;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $deals = Deal::where('status', 'won')->get();

        // $labels = $deals->pluck('title')->toArray();
        // $data = $deals->pluck('amount')->toArray();
        // return view('dashboard', [
        //     'customers' => Customer::count(),
        //     'deals' => Deal::count(),
        //     'revenue' => Payment::sum('amount'),
        //     'labels' => $labels,
        //     'data' => $data,
        // ]);

         // KPI
        $customers = Customer::count();
        $deals = Deal::count();
        $revenue = Payment::sum('amount');

        // 1. Revenue per Deal (Bar)
        $wonDeals = Deal::where('status', 'won')->get();
        $dealLabels = $wonDeals->pluck('title')->toArray();
        $dealData = $wonDeals->pluck('amount')->toArray();

        // 2. Deals by Status (Pie)
        $statusData = Deal::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $statusLabels = $statusData->keys();
        $statusCounts = $statusData->values();

        // 3. Revenue Trend (Monthly Line)
        $monthly = Deal::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(amount) as total')
        )
        ->where('status', 'won')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month');

        $months = $monthly->keys();
        $monthlyRevenue = $monthly->values();

        return view('dashboard', compact(
            'customers',
            'deals',
            'revenue',
            'dealLabels',
            'dealData',
            'statusLabels',
            'statusCounts',
            'months',
            'monthlyRevenue'
        ));
    }
}
