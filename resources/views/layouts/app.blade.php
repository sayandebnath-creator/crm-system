<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NexCRM</title>

    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('crm.png') }}">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-900 text-gray-300 flex flex-col">

        <!-- Logo -->
        <div class="px-6 py-5 text-white text-xl font-semibold border-b border-gray-800">
            NexCRM
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-4 py-4 space-y-2 text-sm">

        <a href="/dashboard"
        class="flex items-center gap-3 px-3 py-2 rounded-md
        {{ request()->is('dashboard') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
        
            <x-heroicon-o-chart-bar class="w-5 h-5"/>
            Dashboard
        </a>

        <a href="{{ route('customers.index') }}"
        class="flex items-center gap-3 px-3 py-2 rounded-md
        {{ request()->is('customers*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
        
            <x-heroicon-o-users class="w-5 h-5"/>
            Customers
        </a>

        <a href="{{ route('deals.index') }}"
        class="flex items-center gap-3 px-3 py-2 rounded-md
        {{ request()->is('deals*') ? 'bg-gray-800 text-white' : 'hover:bg-gray-800 hover:text-white' }}">
        
            <x-heroicon-o-briefcase class="w-5 h-5"/>
            Deals
        </a>

    </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-gray-800">
            <!-- <form action="{{ route('logout') }}" method="POST"> -->
                @csrf
                <button type="submit"
                    onclick="openLogoutModal()"
                    class="flex items-center gap-2 w-full px-3 py-2 rounded-md hover:bg-red-600 hover:text-white transition">
                    <x-heroicon-o-arrow-right-on-rectangle class="w-5 h-5"/>
                    Logout
                </button>
            <!-- </form> -->
        </div>

    </aside>


    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white border-b px-6 py-4 flex items-center justify-between">

            <!-- Left -->
            <h2 class="text-lg font-semibold text-gray-800">
                @yield('title', 'Dashboard')
            </h2>

            <!-- Right -->
            <div class="flex items-center gap-4">

                <!-- Search -->
                <!-- <input type="text"
                    placeholder="Search..."
                    class="border px-3 py-1.5 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"> -->

                <!-- User -->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gray-300 rounded-full"><x-heroicon-o-user class="w-100 h-100"/></div>
                    <span class="text-sm text-gray-600">
                        {{ auth()->user()->email ?? 'User' }}
                    </span>
                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <main class="flex-1 p-6 overflow-y-auto">

            <!-- Flash Message -->
            @if(session('success'))
                <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>

</div>

<div id="logoutModal" onclick="if(event.target.id==='logoutModal') closeLogoutModal()" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center transition-opacity duration-200">

    <div class="bg-white rounded-lg shadow-lg p-6 w-80">
        <h2 class="text-lg font-semibold mb-4">Confirm Logout</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to logout?</p>

        <div class="flex justify-end gap-3">
            <button onclick="closeLogoutModal()" 
                class="px-4 py-2 bg-gray-200 rounded">
                Cancel
            </button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-4 py-2 bg-red-600 text-white rounded">
                    Logout
                </button>
            </form>
        </div>
    </div>

</div>

@yield('scripts')

<!-- custom js for modal toggling with element ID -->
<script>
function openLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.add('hidden');
}
</script>

</body>
</html>