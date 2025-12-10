@extends('layouts.admin')

@section('page-title', 'Leads Management')

@section('admin-content')
<div class="mb-6 flex justify-between items-center">
    <div class="flex space-x-3">
        <select id="status-filter" onchange="filterLeads()" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">All Status</option>
            <option value="new">New</option>
            <option value="contacted">Contacted</option>
            <option value="qualified">Qualified</option>
            <option value="converted">Converted</option>
            <option value="lost">Lost</option>
        </select>
        <input
            type="text"
            id="search"
            placeholder="Search leads..."
            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            onkeyup="searchLeads()"
        >
    </div>
    <button onclick="loadLeads()" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
        <i class="fas fa-sync-alt mr-2"></i>Refresh
    </button>
</div>

<!-- Leads Table -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Program</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Source</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
            </tr>
        </thead>
        <tbody id="leads-table-body" class="bg-white divide-y divide-gray-200">
            <!-- Will be populated by AJAX -->
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div id="pagination" class="mt-4 flex justify-center">
    <!-- Will be populated by AJAX -->
</div>
@endsection

@push('scripts')
<script>
    let currentPage = 1;
    let allLeads = [];
    let currentFilter = '';

    async function loadLeads(page = 1) {
        try {
            showLoading();
            const status = document.getElementById('status-filter').value;
            let url = `/admin/leads?page=${page}&per_page=15`;
            if (status) {
                url += `&status=${status}`;
            }

            const response = await apiRequest(url, 'GET');

            if (response.success) {
                allLeads = response.data.data;
                renderLeads(allLeads);
                renderPagination(response.data);
                currentPage = page;
            }
        } catch (error) {
            showToast('Failed to load leads', 'error');
        } finally {
            hideLoading();
        }
    }

    function renderLeads(leads) {
        const tbody = document.getElementById('leads-table-body');
        tbody.innerHTML = '';

        if (leads.length === 0) {
            tbody.innerHTML = '<tr><td colspan="7" class="px-6 py-4 text-center text-gray-500">No leads found</td></tr>';
            return;
        }

        const statusColors = {
            'new': 'bg-blue-100 text-blue-800',
            'contacted': 'bg-yellow-100 text-yellow-800',
            'qualified': 'bg-purple-100 text-purple-800',
            'converted': 'bg-green-100 text-green-800',
            'lost': 'bg-red-100 text-red-800'
        };

        leads.forEach(lead => {
            const statusClass = statusColors[lead.status] || 'bg-gray-100 text-gray-800';

            tbody.innerHTML += `
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">${lead.name}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        ${lead.email}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        ${lead.phone}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        ${lead.program ? lead.program.name : 'N/A'}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full ${statusClass}">
                            ${lead.status}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        ${lead.source || 'N/A'}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        ${formatDate(lead.created_at)}
                    </td>
                </tr>
            `;
        });
    }

    function renderPagination(data) {
        const container = document.getElementById('pagination');
        container.innerHTML = '';

        if (data.last_page <= 1) return;

        for (let i = 1; i <= data.last_page; i++) {
            const active = i === data.current_page ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-50';
            container.innerHTML += `
                <button onclick="loadLeads(${i})" class="${active} px-4 py-2 border border-gray-300 mx-1 rounded">
                    ${i}
                </button>
            `;
        }
    }

    function filterLeads() {
        loadLeads(1);
    }

    function searchLeads() {
        const search = document.getElementById('search').value.toLowerCase();
        const filtered = allLeads.filter(lead =>
            lead.name.toLowerCase().includes(search) ||
            lead.email.toLowerCase().includes(search) ||
            lead.phone.includes(search)
        );
        renderLeads(filtered);
    }

    // Load leads on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadLeads();
    });
</script>
@endpush
