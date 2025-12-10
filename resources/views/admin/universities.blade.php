@extends('layouts.admin')

@section('page-title', 'Universities Management')

@section('admin-content')
<div class="mb-6 flex justify-between items-center">
    <h3 class="text-lg font-semibold">Manage Universities</h3>
    <button onclick="openCreateModal()" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i>Add University
    </button>
</div>

<div id="universities-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Will be populated by AJAX -->
</div>

<!-- Create/Edit Modal -->
<div id="universityModal" class="modal">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <h3 id="modal-title" class="text-2xl font-bold mb-6">Add University</h3>
        <form id="universityForm" onsubmit="handleSubmit(event)">
            <input type="hidden" id="university-id">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                <input type="text" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                <input type="text" id="location" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                <input type="url" id="website" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
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
    async function loadUniversities() {
        try {
            showLoading();
            const response = await apiRequest('/universities', 'GET', null, false);
            if (response.success) {
                renderUniversities(response.data);
            }
        } catch (error) {
            showToast('Failed to load universities', 'error');
        } finally {
            hideLoading();
        }
    }

    function renderUniversities(universities) {
        const grid = document.getElementById('universities-grid');
        grid.innerHTML = '';
        universities.forEach(uni => {
            grid.innerHTML += `
                <div class="bg-white rounded-lg shadow p-6">
                    <h4 class="text-lg font-semibold mb-2">${uni.name}</h4>
                    <p class="text-gray-600 text-sm mb-2">${uni.location || 'Location not specified'}</p>
                    <p class="text-gray-500 text-xs mb-4">${uni.description || 'No description'}</p>
                    <div class="flex justify-end space-x-2">
                        <button onclick="editUniversity(${uni.id})" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteUniversity(${uni.id})" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
        });
    }

    function openCreateModal() {
        document.getElementById('modal-title').textContent = 'Add University';
        document.getElementById('universityForm').reset();
        document.getElementById('university-id').value = '';
        document.getElementById('universityModal').classList.add('active');
    }

    async function editUniversity(id) {
        try {
            showLoading();
            const response = await apiRequest('/universities', 'GET', null, false);
            const uni = response.data.find(u => u.id === id);
            if (uni) {
                document.getElementById('modal-title').textContent = 'Edit University';
                document.getElementById('university-id').value = uni.id;
                document.getElementById('name').value = uni.name;
                document.getElementById('location').value = uni.location || '';
                document.getElementById('website').value = uni.website || '';
                document.getElementById('description').value = uni.description || '';
                document.getElementById('universityModal').classList.add('active');
            }
        } catch (error) {
            showToast('Failed to load university', 'error');
        } finally {
            hideLoading();
        }
    }

    async function handleSubmit(event) {
        event.preventDefault();
        const id = document.getElementById('university-id').value;
        const data = {
            name: document.getElementById('name').value,
            location: document.getElementById('location').value,
            website: document.getElementById('website').value,
            description: document.getElementById('description').value,
            is_active: true
        };

        try {
            showLoading();
            if (id) {
                await apiRequest(`/admin/universities/${id}`, 'PUT', data);
                showToast('University updated successfully', 'success');
            } else {
                await apiRequest('/admin/universities', 'POST', data);
                showToast('University created successfully', 'success');
            }
            closeModal();
            loadUniversities();
        } catch (error) {
            showToast(error.message || 'Failed to save university', 'error');
        } finally {
            hideLoading();
        }
    }

    async function deleteUniversity(id) {
        if (!confirm('Are you sure?')) return;
        try {
            showLoading();
            await apiRequest(`/admin/universities/${id}`, 'DELETE');
            showToast('University deleted successfully', 'success');
            loadUniversities();
        } catch (error) {
            showToast('Failed to delete university', 'error');
        } finally {
            hideLoading();
        }
    }

    function closeModal() {
        document.getElementById('universityModal').classList.remove('active');
    }

    document.addEventListener('DOMContentLoaded', loadUniversities);
</script>
@endpush
