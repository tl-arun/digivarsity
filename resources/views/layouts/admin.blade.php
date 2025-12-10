@extends('layouts.app')

@section('content')
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-black text-white border-r-2 border-blue-600">
        <div class="p-6 border-b border-blue-600">
            <img src="/images/digivarsity-logo.svg" alt="Digivarsity" class="h-10 mb-2">
            <p class="text-sm text-blue-400">Admin Panel</p>
        </div>

        <nav class="mt-6">
            <a href="/admin/dashboard" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/dashboard') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="/admin/programs" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/programs') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-graduation-cap mr-3"></i>
                Programs
            </a>
            <a href="/admin/intents" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/intents') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-bullseye mr-3"></i>
                Intents
            </a>
            <a href="/admin/outcomes" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/outcomes') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-trophy mr-3"></i>
                Outcomes
            </a>
            <a href="/admin/universities" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/universities') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-university mr-3"></i>
                Universities
            </a>
            <a href="/admin/testimonials" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/testimonials') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-quote-left mr-3"></i>
                Testimonials
            </a>
            <a href="/admin/home-settings" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/home-settings') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-home mr-3"></i>
                Home Page Control
            </a>
            <a href="/admin/leads" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/leads') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-users mr-3"></i>
                Leads
            </a>
            <a href="/admin/users" class="flex items-center px-6 py-3 hover:bg-blue-900/30 {{ request()->is('admin/users') ? 'bg-blue-900/50 border-l-4 border-blue-500' : '' }}">
                <i class="fas fa-user-cog mr-3"></i>
                Users
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Bar -->
        <header class="bg-white shadow-sm">
            <div class="flex items-center justify-between px-6 py-4">
                <h2 class="text-2xl font-semibold text-gray-800">@yield('page-title')</h2>

                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-700" id="user-name">Loading...</p>
                        <p class="text-xs text-gray-500" id="user-role">Loading...</p>
                    </div>
                    <button onclick="logout()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('admin-content')
        </main>
    </div>
</div>

<script>
    // Load user data on page load
    document.addEventListener('DOMContentLoaded', async function() {
        // Check if authenticated
        if (!isAuthenticated()) {
            window.location.href = '/login';
            return;
        }

        // Load user data
        try {
            const response = await apiRequest('/auth/me', 'GET');
            if (response.success) {
                setUserData(response.data);
                document.getElementById('user-name').textContent = response.data.name;
                const roles = response.data.roles.map(r => r.name).join(', ');
                document.getElementById('user-role').textContent = roles;
            }
        } catch (error) {
            console.error('Failed to load user data:', error);
        }
    });
</script>
@endsection
