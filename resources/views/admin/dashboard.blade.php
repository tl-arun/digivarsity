@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('admin-content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Programs</p>
                <p class="text-3xl font-bold text-blue-600" id="total-programs">0</p>
            </div>
            <div class="bg-blue-100 rounded-full p-3">
                <i class="fas fa-graduation-cap text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Leads</p>
                <p class="text-3xl font-bold text-green-600" id="total-leads">0</p>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <i class="fas fa-users text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Intents</p>
                <p class="text-3xl font-bold text-blue-700" id="total-intents">0</p>
            </div>
            <div class="bg-blue-100 rounded-full p-3">
                <i class="fas fa-bullseye text-blue-700 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Outcomes</p>
                <p class="text-3xl font-bold text-orange-600" id="total-outcomes">0</p>
            </div>
            <div class="bg-orange-100 rounded-full p-3">
                <i class="fas fa-trophy text-orange-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Leads by Status -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Leads by Status</h3>
        <div id="leads-by-status" class="space-y-3">
            <!-- Will be populated by AJAX -->
        </div>
    </div>

    <!-- Recent Leads -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Top Programs by Leads</h3>
        <div id="leads-by-program" class="space-y-3">
            <!-- Will be populated by AJAX -->
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="/admin/programs" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
            <i class="fas fa-plus-circle text-indigo-600 text-2xl mr-3"></i>
            <div>
                <p class="font-semibold">Add Program</p>
                <p class="text-sm text-gray-500">Create new program</p>
            </div>
        </a>
        <a href="/admin/leads" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
            <i class="fas fa-eye text-green-600 text-2xl mr-3"></i>
            <div>
                <p class="font-semibold">View Leads</p>
                <p class="text-sm text-gray-500">Manage all leads</p>
            </div>
        </a>
        <a href="/admin/universities" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
            <i class="fas fa-university text-purple-600 text-2xl mr-3"></i>
            <div>
                <p class="font-semibold">Universities</p>
                <p class="text-sm text-gray-500">Manage universities</p>
            </div>
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    async function loadDashboardData() {
        try {
            showLoading();
            const response = await apiRequest('/admin/dashboard', 'GET');

            if (response.success) {
                const data = response.data;

                // Update stats
                document.getElementById('total-programs').textContent = data.total_programs;
                document.getElementById('total-leads').textContent = data.total_leads;
                document.getElementById('total-intents').textContent = data.total_intents;
                document.getElementById('total-outcomes').textContent = data.total_outcomes;

                // Render leads by status
                renderLeadsByStatus(data.leads_by_status);

                // Render leads by program
                renderLeadsByProgram(data.leads_per_program);
            }
        } catch (error) {
            showToast('Failed to load dashboard data', 'error');
        } finally {
            hideLoading();
        }
    }

    function renderLeadsByStatus(data) {
        const container = document.getElementById('leads-by-status');
        container.innerHTML = '';

        const colors = {
            'new': 'bg-blue-500',
            'contacted': 'bg-yellow-500',
            'qualified': 'bg-purple-500',
            'converted': 'bg-green-500',
            'lost': 'bg-red-500'
        };

        data.forEach(item => {
            const percentage = (item.count / data.reduce((sum, i) => sum + i.count, 0) * 100).toFixed(1);
            const color = colors[item.status] || 'bg-gray-500';

            container.innerHTML += `
                <div class="flex items-center justify-between">
                    <div class="flex items-center flex-1">
                        <span class="capitalize font-medium w-24">${item.status}</span>
                        <div class="flex-1 mx-4">
                            <div class="bg-gray-200 rounded-full h-2">
                                <div class="${color} h-2 rounded-full" style="width: ${percentage}%"></div>
                            </div>
                        </div>
                    </div>
                    <span class="font-bold">${item.count}</span>
                </div>
            `;
        });
    }

    function renderLeadsByProgram(data) {
        const container = document.getElementById('leads-by-program');
        container.innerHTML = '';

        const topPrograms = data.slice(0, 5);

        if (topPrograms.length === 0) {
            container.innerHTML = '<p class="text-gray-500 text-center">No data available</p>';
            return;
        }

        topPrograms.forEach(item => {
            if (item.program) {
                container.innerHTML += `
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                        <span class="text-sm">${item.program.name}</span>
                        <span class="font-bold text-indigo-600">${item.count}</span>
                    </div>
                `;
            }
        });
    }

    // Load data on page load
    document.addEventListener('DOMContentLoaded', loadDashboardData);
</script>
@endpush
