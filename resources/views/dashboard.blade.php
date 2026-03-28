@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- KPI CARDS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    <div class="bg-white p-6 rounded-xl shadow-sm border">
        <p class="text-sm text-gray-500">Total Customers</p>
        <h2 class="text-2xl font-semibold mt-1">{{ $customers }}</h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border">
        <p class="text-sm text-gray-500">Total Deals</p>
        <h2 class="text-2xl font-semibold mt-1">{{ $deals }}</h2>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border">
        <p class="text-sm text-gray-500">Revenue</p>
        <h2 class="text-2xl font-semibold mt-1 text-green-600">₹{{ $revenue }}</h2>
    </div>

</div>


<!-- CHARTS GRID -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Revenue Trend (BIG) -->
    <div class="bg-white p-6 rounded-xl shadow-sm border lg:col-span-2">
        <h3 class="text-sm font-medium text-gray-600 mb-4">Revenue Trend</h3>
        <canvas id="lineChart" height="120"></canvas>
    </div>

    <!-- Deals Status -->
    <div class="bg-white p-6 rounded-xl shadow-sm border">
        <h3 class="text-sm font-medium text-gray-600 mb-4">Deals by Status</h3>
        <canvas id="pieChart"></canvas>
    </div>

    <!-- Revenue per Deal -->
    <div class="bg-white p-6 rounded-xl shadow-sm border lg:col-span-3">
        <h3 class="text-sm font-medium text-gray-600 mb-4">Revenue per Deal</h3>
        <canvas id="barChart" height="100"></canvas>
    </div>

</div>

@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let lineChart, pieChart, barChart;

document.addEventListener('turbo:load', function () {

    // LINE CHART
    const lineCtx = document.getElementById('lineChart');
    if (lineCtx) {
        if (lineChart) lineChart.destroy();

        lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Revenue',
                    data: @json($monthlyRevenue),
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                responsive: true
            }
        });
    }

    // PIE CHART
    const pieCtx = document.getElementById('pieChart');
    if (pieCtx) {
        if (pieChart) pieChart.destroy();

        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: @json($statusLabels),
                datasets: [{
                    data: @json($statusCounts)
                }]
            },
            options: {
                plugins: { legend: { position: 'bottom' } }
            }
        });
    }

    // BAR CHART
    const barCtx = document.getElementById('barChart');
    if (barCtx) {
        if (barChart) barChart.destroy();

        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: @json($dealLabels),
                datasets: [{
                    label: 'Revenue',
                    data: @json($dealData),
                    borderWidth: 1
                }]
            },
            options: {
                plugins: { legend: { display: false } }
            }
        });
    }

});
</script>
@endsection