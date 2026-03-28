<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'NexCRM') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('crm.png') }}">
</head>

<body class="bg-gray-50 font-[Inter] text-gray-900">

<!-- NAVBAR -->
<header class="flex justify-between items-center px-8 py-4 bg-white shadow-sm sticky top-0 z-50">
    <h1 class="text-xl font-bold">NexCRM</h1>

    <div class="space-x-4">
        @auth
            <a href="/dashboard" class="px-4 py-2 bg-blue-600 text-white rounded-lg">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">
                Login
            </a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow">
                Get Started
            </a>
        @endauth
    </div>
</header>

<!-- HERO -->
<section class="grid md:grid-cols-2 gap-10 items-center px-10 py-20 max-w-7xl mx-auto">

    <!-- LEFT -->
    <div>
        <h2 class="text-5xl font-bold leading-tight mb-6">
            Close Deals Faster.<br>Get Paid Instantly.
        </h2>

        <p class="text-gray-600 text-lg mb-8">
            NexCRM helps you manage customers, track deals, and accept payments —
            all in one powerful dashboard powered by Stripe.
        </p>

        <div class="space-x-4">
            <a href="{{ route('register') }}"
               class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700">
                Start Free
            </a>

            <a href="{{ route('login') }}"
               class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-100">
                Login
            </a>
        </div>

        <!-- TRUST -->
        <p class="text-sm text-gray-400 mt-6">
            Trusted by startups & freelancers worldwide
        </p>
    </div>

    <!-- RIGHT (IMAGE) custom added from folder-->
    <div class="relative mt-16 flex justify-center z-10">
        <img 
            src="{{ asset('images/dashboard.jpeg') }}" 
            alt="CRM Dashboard"
            class="rounded-2xl shadow-2xl border w-[900px] max-w-full hover:scale-[1.02] transition duration-300"
        >
    </div>
</section>

<!-- LOGOS -->
<section class="bg-white py-10">
    <div class="flex justify-center gap-10 opacity-60">
        <span>Stripe</span>
        <span>Slack</span>
        <span>Notion</span>
        <span>HubSpot</span>
    </div>
</section>

<!-- FEATURES -->
<section class="max-w-7xl mx-auto px-10 py-20">

    <h2 class="text-3xl font-bold text-center mb-12">
        Everything you need to scale sales
    </h2>

    <div class="grid md:grid-cols-3 gap-8">

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/1077/1077012.png" class="w-12 mb-4">
            <h3 class="font-semibold text-lg mb-2">Customer Management</h3>
            <p class="text-gray-600 text-sm">
                Centralize customer data and interactions in one place.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png" class="w-12 mb-4">
            <h3 class="font-semibold text-lg mb-2">Deal Tracking</h3>
            <p class="text-gray-600 text-sm">
                Track deals through pipelines and close faster.
            </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/633/633611.png" class="w-12 mb-4">
            <h3 class="font-semibold text-lg mb-2">Stripe Payments</h3>
            <p class="text-gray-600 text-sm">
                Accept payments seamlessly inside your CRM.
            </p>
        </div>

    </div>
</section>

<!-- PRODUCT PREVIEW -->
<section class="bg-gray-100 py-20">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-6">
            Built for modern sales teams
        </h2>
<!-- ADDED CUSTOM IMAGE FROM PUBLIC FOLDER -->
    <img src="{{asset('images/salesteam.jpeg') }}" alt="CRM ILLUSTRATION"
        class="rounded-xl shadow-lg mx-auto">
        </div>
    </section>

<!-- TESTIMONIAL -->
<section class="max-w-4xl mx-auto py-20 text-center">
    <p class="text-xl italic text-gray-700 mb-6">
        "NexCRM completely changed how we manage deals and payments.
        Everything is faster and more organized."
    </p>

    <h4 class="font-semibold">— Startup Founder</h4>
</section>

<!-- CTA -->
<section class="bg-blue-600 text-white text-center py-20">
    <h2 class="text-4xl font-bold mb-6">
        Ready to grow your revenue?
    </h2>

    <a href="{{ route('register') }}"
       class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold shadow-lg">
        Get Started for Free
    </a>
</section>

<!-- FOOTER -->
<footer class="text-center text-sm text-gray-500 py-6">
    © {{ date('Y') }} NexCRM. All rights reserved.
</footer>

</body>
</html>