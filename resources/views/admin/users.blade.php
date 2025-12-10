@extends('layouts.admin')

@section('page-title', 'Users Management')

@section('admin-content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <input
            type="text"
            id="search"
            placeholder="Search users..."
            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            onkeyup="searchUsers()"
        >
    </div>
    <button onclick="openCreateModal()" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i>Add User
    </button>
</div>

<!-- Users Table -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Roles</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody id="users-table-body" class="bg-white divide-y divide-gray-200">
            <!-- Will be populated by AJAX -->
        </tbody>
    </table>
</div>

<!-- Create/Edit Modal -->
<div id="userModal" class="modal">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <div class="flex justify-between items-center mb-6">
            <h3 id="modal-title" class="text-2xl font-bold">Add User</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>

        <form id="userForm" onsubmit="handleSubmit(event)">
            <input type="hidden" id="user-id">

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                <input type="text" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                <input type="email" id="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                <input type="tel" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4" id="password-field">
                <label class="block text-sm font-medium text-gray-700 mb-2">Password *</label>
                <input type="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                <p class="text-xs text-gray-500 mt-1">Leave blank to keep current password (when editing)</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="is_active" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Save User
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Assign Role Modal -->
<div id="roleModal" class="modal">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <h3 class="text-2xl font-bold mb-6">Assign Role</h3>
        <form id="roleForm" onsubmit="handleRoleAssign(event)">
            <input type="hidden" id="role-user-id">

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Role *</label>
                <select id="role_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">Select Role</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeRoleModal()" class="px-6 py-2 border border-gray-300 rounded-lg">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg">Assign Role</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let allUsers = [];
    let allRoles = [];

    async function loadUsers() {
        try {
            showLoading();
            // Note: This endpoint doesn't exist in API yet, using mock data
            // In production, you'd need to add GET /admin/users endpoint
            showToast('Users list will be loaded from API', 'info');

            // Mock data for demonstration
            allUsers = [
                {
                    id: 1,
                    name: 'Admin User',
                    email: 'admin@digivarsity.com',
                    phone: '1234567890',
                    is_active: true,
                    roles: [{name: 'Admin', slug: 'admin'}]
                },
                {
                    id: 2,
                    name: 'Counselor User',
                    email: 'counselor@digivarsity.com',
                    phone: '0987654321',
                    is_active: true,
                    roles: [{name: 'Counselor', slug: 'counselor'}]
                }
            ];

            renderUsers(allUsers);
        } catch (error) {
            showToast('Failed to load users', 'error');
        } finally {
            hideLoading();
        }
    }

    function renderUsers(users) {
        const tbody = document.getElementById('users-table-body');
        tbody.innerHTML = '';

        if (users.length === 0) {
            tbody.innerHTML = '<tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found</td></tr>';
            return;
        }

        users.forEach(user => {
            const roles = user.roles ? user.roles.map(r => r.name).join(', ') : 'No roles';

            tbody.innerHTML += `
                <tr>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">${user.name}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">${user.email}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">${user.phone || 'N/A'}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                            ${roles}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full ${user.is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                            ${user.is_active ? 'Active' : 'Inactive'}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <button onclick="editUser(${user.id})" class="text-indigo-600 hover:text-indigo-900 mr-3" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="openRoleModal(${user.id})" class="text-purple-600 hover:text-purple-900 mr-3" title="Assign Role">
                            <i class="fas fa-user-tag"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
    }

    async function loadRoles() {
        try {
            // Mock roles data
            allRoles = [
                {id: 1, name: 'Admin', slug: 'admin'},
                {id: 2, name: 'Counselor', slug: 'counselor'},
                {id: 3, name: 'User', slug: 'user'}
            ];

            const select = document.getElementById('role_id');
            select.innerHTML = '<option value="">Select Role</option>';
            allRoles.forEach(role => {
                select.innerHTML += `<option value="${role.id}">${role.name}</option>`;
            });
        } catch (error) {
            console.error('Failed to load roles:', error);
        }
    }

    function openCreateModal() {
        document.getElementById('modal-title').textContent = 'Add User';
        document.getElementById('userForm').reset();
        document.getElementById('user-id').value = '';
        document.getElementById('password').required = true;
        document.getElementById('userModal').classList.add('active');
    }

    function editUser(id) {
        const user = allUsers.find(u => u.id === id);
        if (user) {
            document.getElementById('modal-title').textContent = 'Edit User';
            document.getElementById('user-id').value = user.id;
            document.getElementById('name').value = user.name;
            document.getElementById('email').value = user.email;
            document.getElementById('phone').value = user.phone || '';
            document.getElementById('is_active').value = user.is_active ? '1' : '0';
            document.getElementById('password').required = false;
            document.getElementById('password').value = '';
            document.getElementById('userModal').classList.add('active');
        }
    }

    async function handleSubmit(event) {
        event.preventDefault();

        const id = document.getElementById('user-id').value;
        const data = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            is_active: document.getElementById('is_active').value === '1'
        };

        const password = document.getElementById('password').value;
        if (password) {
            data.password = password;
        }

        try {
            showLoading();

            if (id) {
                await apiRequest(`/admin/users/${id}`, 'PUT', data);
                showToast('User updated successfully', 'success');
            } else {
                await apiRequest('/admin/users', 'POST', data);
                showToast('User created successfully', 'success');
            }

            closeModal();
            loadUsers();
        } catch (error) {
            showToast(error.message || 'Failed to save user', 'error');
        } finally {
            hideLoading();
        }
    }

    function openRoleModal(userId) {
        document.getElementById('role-user-id').value = userId;
        loadRoles();
        document.getElementById('roleModal').classList.add('active');
    }

    async function handleRoleAssign(event) {
        event.preventDefault();

        const userId = document.getElementById('role-user-id').value;
        const roleId = document.getElementById('role_id').value;

        try {
            showLoading();
            await apiRequest(`/admin/users/${userId}/assign-role`, 'POST', {role_id: parseInt(roleId)});
            showToast('Role assigned successfully', 'success');
            closeRoleModal();
            loadUsers();
        } catch (error) {
            showToast(error.message || 'Failed to assign role', 'error');
        } finally {
            hideLoading();
        }
    }

    function closeModal() {
        document.getElementById('userModal').classList.remove('active');
    }

    function closeRoleModal() {
        document.getElementById('roleModal').classList.remove('active');
    }

    function searchUsers() {
        const search = document.getElementById('search').value.toLowerCase();
        const filtered = allUsers.filter(u =>
            u.name.toLowerCase().includes(search) ||
            u.email.toLowerCase().includes(search)
        );
        renderUsers(filtered);
    }

    document.addEventListener('DOMContentLoaded', loadUsers);
</script>
@endpush
