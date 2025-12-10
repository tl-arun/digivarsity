@extends('layouts.admin')

@section('page-title', 'Outcomes Management')

@section('admin-content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-semibold">Manage Career Outcomes</h3>
    <button onclick="openCreateModal()" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i>Add Outcome
    </button>
</div>

<div id="outcomes-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Will be populated by AJAX -->
</div>

<!-- Empty State -->
<div id="empty-state" class="hidden text-center py-20">
    <div class="text-gray-300 mb-6">
        <i class="fas fa-trophy text-9xl"></i>
    </div>
    <h3 class="text-3xl font-bold text-gray-700 mb-4">No Outcomes Yet</h3>
    <p class="text-xl text-gray-600 mb-8">Start by adding your first career outcome!</p>
    <button onclick="openCreateModal()" class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full font-bold hover:shadow-xl transform hover:scale-105 transition-all">
        <i class="fas fa-plus mr-2"></i>Add First Outcome
    </button>
</div>

<!-- Create/Edit Modal -->
<div id="outcomeModal" class="modal">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <h3 id="modal-title" class="text-2xl font-bold mb-6">Add Outcome</h3>
        <form id="outcomeForm" onsubmit="handleSubmit(event)">
            <input type="hidden" id="outcome-id">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                <input type="text" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="px-6 py-2 border border-gray-300 rounded-lg">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    async function loadOutcomes() {
        try {
            showLoading();
            const response = await apiRequest('/outcomes', 'GET', null, false);
            if (response.success) {
                renderOutcomes(response.data);
            }
        } catch (error) {
            console.error('Error loading outcomes:', error);
            showToast('Failed to load outcomes: ' + (error.message || 'Unknown error'), 'error');
            // Show empty state on error
            document.getElementById('outcomes-grid').classList.add('hidden');
            document.getElementById('empty-state').classList.remove('hidden');
        } finally {
            hideLoading();
        }
    }

    function renderOutcomes(outcomes) {
        const grid = document.getElementById('outcomes-grid');
        const emptyState = document.getElementById('empty-state');

        grid.innerHTML = '';

        if (!outcomes || outcomes.length === 0) {
            grid.classList.add('hidden');
            emptyState.classList.remove('hidden');
            return;
        }

        grid.classList.remove('hidden');
        emptyState.classList.add('hidden');

        outcomes.forEach(outcome => {
            grid.innerHTML += `
                <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow p-6 border-l-4 border-indigo-600">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-trophy text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">${outcome.name}</h4>
                                <span class="text-xs text-gray-500">Career Outcome</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">${outcome.description || 'No description provided'}</p>
                    <div class="flex justify-end space-x-2 pt-3 border-t border-gray-200">
                        <button onclick="editOutcome(${outcome.id})" class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition font-semibold">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button onclick="deleteOutcome(${outcome.id})" class="px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition font-semibold">
                            <i class="fas fa-trash mr-1"></i>Delete
                        </button>
                    </div>
                </div>
            `;
        });
    }

    function openCreateModal() {
        document.getElementById('modal-title').textContent = 'Add Outcome';
        document.getElementById('outcomeForm').reset();
        document.getElementById('outcome-id').value = '';
        document.getElementById('outcomeModal').classList.add('active');
    }

    async function editOutcome(id) {
        try {
            showLoading();
            const response = await apiRequest('/outcomes', 'GET', null, false);
            const outcome = response.data.find(o => o.id === id);
            if (outcome) {
                document.getElementById('modal-title').textContent = 'Edit Outcome';
                document.getElementById('outcome-id').value = outcome.id;
                document.getElementById('name').value = outcome.name;
                document.getElementById('description').value = outcome.description || '';
                document.getElementById('outcomeModal').classList.add('active');
            }
        } catch (error) {
            showToast('Failed to load outcome', 'error');
        } finally {
            hideLoading();
        }
    }

    async function handleSubmit(event) {
        event.preventDefault();
        const id = document.getElementById('outcome-id').value;
        const data = {
            name: document.getElementById('name').value,
            description: document.getElementById('description').value,
            is_active: true
        };

        try {
            showLoading();
            if (id) {
                await apiRequest(`/admin/outcomes/${id}`, 'PUT', data);
                showToast('Outcome updated successfully', 'success');
            } else {
                await apiRequest('/admin/outcomes', 'POST', data);
                showToast('Outcome created successfully', 'success');
            }
            closeModal();
            loadOutcomes();
        } catch (error) {
            showToast(error.message || 'Failed to save outcome', 'error');
        } finally {
            hideLoading();
        }
    }

    async function deleteOutcome(id) {
        if (!confirm('Are you sure?')) return;
        try {
            showLoading();
            await apiRequest(`/admin/outcomes/${id}`, 'DELETE');
            showToast('Outcome deleted successfully', 'success');
            loadOutcomes();
        } catch (error) {
            showToast('Failed to delete outcome', 'error');
        } finally {
            hideLoading();
        }
    }

    function closeModal() {
        document.getElementById('outcomeModal').classList.remove('active');
    }

    document.addEventListener('DOMContentLoaded', loadOutcomes);
</script>
@endpush
