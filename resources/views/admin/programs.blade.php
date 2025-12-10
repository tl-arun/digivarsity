@extends('layouts.admin')

@section('page-title', 'Programs Management')

@section('admin-content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <input
            type="text"
            id="search"
            placeholder="Search programs..."
            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
            onkeyup="searchPrograms()"
        >
    </div>
    <button onclick="openCreateModal()" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
        <i class="fas fa-plus mr-2"></i>Add Program
    </button>
</div>

<!-- Programs Table -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">University</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fees</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody id="programs-table-body" class="bg-white divide-y divide-gray-200">
            <!-- Will be populated by AJAX -->
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div id="pagination" class="mt-4 flex justify-center">
    <!-- Will be populated by AJAX -->
</div>

<!-- Create/Edit Modal -->
<div id="programModal" class="modal">
    <div class="bg-white rounded-lg p-8 max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 id="modal-title" class="text-2xl font-bold">Add Program</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>

        <form id="programForm" onsubmit="handleSubmit(event)">
            <input type="hidden" id="program-id">

            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Program Name *</label>
                    <input type="text" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Program Image</label>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">Upload Image</label>
                            <input type="file" id="image_file" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <p class="text-xs text-gray-500 mt-1">Upload JPG, PNG, or WEBP (max 2MB)</p>
                        </div>
                        <div class="text-center text-gray-500 text-sm">OR</div>
                        <div>
                            <label class="block text-xs text-gray-600 mb-1">Image URL</label>
                            <input type="url" id="image_url" placeholder="https://images.unsplash.com/photo-..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <p class="text-xs text-gray-500 mt-1">Or paste an image URL from Unsplash</p>
                        </div>
                    </div>
                    <div id="image_preview" class="mt-3 hidden">
                        <img id="preview_img" src="" alt="Preview" class="w-full h-48 object-cover rounded-lg">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                    <select id="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Select Type</option>
                        <option value="online">Online</option>
                        <option value="odl">ODL</option>
                        <option value="work-linked">Work-Linked</option>
                        <option value="executive">Executive</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">University *</label>
                    <select id="university_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Select University</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Intent</label>
                    <select id="intent_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Select Intent</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Outcome</label>
                    <select id="outcome_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">Select Outcome</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                    <input type="text" id="duration" placeholder="e.g., 2 years" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Fees (₹)</label>
                    <input type="number" id="fees" placeholder="150000" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Eligibility</label>
                    <textarea id="eligibility" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Save Program
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let currentPage = 1;
    let allPrograms = [];

    async function loadPrograms(page = 1) {
        try {
            showLoading();
            const response = await apiRequest(`/programs?page=${page}&per_page=10`, 'GET', null, false);

            if (response.success) {
                allPrograms = response.data.data;
                renderPrograms(allPrograms);
                renderPagination(response.data);
            }
        } catch (error) {
            showToast('Failed to load programs', 'error');
        } finally {
            hideLoading();
        }
    }

    function renderPrograms(programs) {
        const tbody = document.getElementById('programs-table-body');
        tbody.innerHTML = '';

        if (programs.length === 0) {
            tbody.innerHTML = '<tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No programs found</td></tr>';
            return;
        }

        programs.forEach(program => {
            tbody.innerHTML += `
                <tr>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">${program.name}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
                            ${program.type}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        ${program.university ? program.university.name : 'N/A'}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        ${formatCurrency(program.fees)}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full ${program.is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                            ${program.is_active ? 'Active' : 'Inactive'}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <button onclick="editProgram(${program.id})" class="text-indigo-600 hover:text-indigo-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteProgram(${program.id})" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </button>
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
                <button onclick="loadPrograms(${i})" class="${active} px-4 py-2 border border-gray-300 mx-1 rounded">
                    ${i}
                </button>
            `;
        }
    }

    async function loadUniversities() {
        try {
            const response = await apiRequest('/universities', 'GET', null, false);
            if (response.success) {
                const select = document.getElementById('university_id');
                select.innerHTML = '<option value="">Select University</option>';
                response.data.forEach(uni => {
                    select.innerHTML += `<option value="${uni.id}">${uni.name}</option>`;
                });
            }
        } catch (error) {
            console.error('Failed to load universities:', error);
        }
    }

    async function loadIntents() {
        try {
            console.log('Loading intents...');
            const response = await apiRequest('/intents', 'GET', null, false);
            console.log('Intents response:', response);

            if (response.success && response.data) {
                const select = document.getElementById('intent_id');
                select.innerHTML = '<option value="">Select Intent</option>';
                response.data.forEach(intent => {
                    select.innerHTML += `<option value="${intent.id}">${intent.name}</option>`;
                });
                console.log(`Loaded ${response.data.length} intents`);
            }
        } catch (error) {
            console.error('Failed to load intents:', error);
            showToast('Failed to load intents', 'error');
        }
    }

    async function loadOutcomes() {
        try {
            console.log('Loading outcomes...');
            const response = await apiRequest('/outcomes', 'GET', null, false);
            console.log('Outcomes response:', response);

            if (response.success && response.data) {
                const select = document.getElementById('outcome_id');
                select.innerHTML = '<option value="">Select Outcome</option>';
                response.data.forEach(outcome => {
                    select.innerHTML += `<option value="${outcome.id}">${outcome.name}</option>`;
                });
                console.log(`Loaded ${response.data.length} outcomes`);
            }
        } catch (error) {
            console.error('Failed to load outcomes:', error);
            showToast('Failed to load outcomes', 'error');
        }
    }

    function openCreateModal() {
        document.getElementById('modal-title').textContent = 'Add Program';
        document.getElementById('programForm').reset();
        document.getElementById('program-id').value = '';
        document.getElementById('programModal').classList.add('active');
        loadUniversities();
        loadIntents();
        loadOutcomes();
    }

    async function editProgram(id) {
        try {
            showLoading();
            const response = await apiRequest(`/programs/${id}`, 'GET', null, false);

            if (response.success) {
                const program = response.data;
                console.log('Program data:', program);
                console.log('Intent ID:', program.intent_id);
                console.log('Outcome ID:', program.outcome_id);

                document.getElementById('modal-title').textContent = 'Edit Program';
                document.getElementById('program-id').value = program.id;
                document.getElementById('name').value = program.name;
                document.getElementById('image_url').value = program.image_url || '';
                document.getElementById('type').value = program.type;
                document.getElementById('duration').value = program.duration || '';
                document.getElementById('fees').value = program.fees || '';
                document.getElementById('description').value = program.description || '';
                document.getElementById('eligibility').value = program.eligibility || '';

                // Show image preview if exists
                if (program.image_url) {
                    document.getElementById('preview_img').src = program.image_url;
                    document.getElementById('image_preview').classList.remove('hidden');
                }

                await loadUniversities();
                document.getElementById('university_id').value = program.university_id;

                await loadIntents();
                const intentSelect = document.getElementById('intent_id');
                intentSelect.value = program.intent_id || '';
                console.log('Set intent_id to:', intentSelect.value);

                await loadOutcomes();
                const outcomeSelect = document.getElementById('outcome_id');
                outcomeSelect.value = program.outcome_id || '';
                console.log('Set outcome_id to:', outcomeSelect.value);

                document.getElementById('programModal').classList.add('active');
            }
        } catch (error) {
            showToast('Failed to load program details', 'error');
        } finally {
            hideLoading();
        }
    }

    async function handleSubmit(event) {
        event.preventDefault();

        const id = document.getElementById('program-id').value;
        const imageFile = document.getElementById('image_file').files[0];
        const imageUrl = document.getElementById('image_url').value;

        // Use FormData if file is uploaded, otherwise use JSON
        let data, headers, body;

        if (imageFile) {
            // File upload - use FormData
            data = new FormData();
            data.append('name', document.getElementById('name').value);
            data.append('image', imageFile);
            data.append('type', document.getElementById('type').value);
            data.append('university_id', document.getElementById('university_id').value);
            data.append('intent_id', document.getElementById('intent_id').value || '');
            data.append('outcome_id', document.getElementById('outcome_id').value || '');
            data.append('duration', document.getElementById('duration').value);
            data.append('fees', document.getElementById('fees').value || '');
            data.append('description', document.getElementById('description').value);
            data.append('eligibility', document.getElementById('eligibility').value);
            data.append('is_active', '1');

            headers = {
                'Accept': 'application/json',
                'Authorization': `Bearer ${getAuthToken()}`
            };
            body = data;
        } else {
            // JSON data
            data = {
                name: document.getElementById('name').value,
                image_url: imageUrl,
                type: document.getElementById('type').value,
                university_id: parseInt(document.getElementById('university_id').value),
                intent_id: document.getElementById('intent_id').value ? parseInt(document.getElementById('intent_id').value) : null,
                outcome_id: document.getElementById('outcome_id').value ? parseInt(document.getElementById('outcome_id').value) : null,
                duration: document.getElementById('duration').value,
                fees: parseFloat(document.getElementById('fees').value) || null,
                description: document.getElementById('description').value,
                eligibility: document.getElementById('eligibility').value,
                is_active: true
            };

            headers = {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'Authorization': `Bearer ${getAuthToken()}`
            };
            body = JSON.stringify(data);
        }

        try {
            showLoading();

            const url = id ? `${API_BASE_URL}/admin/programs/${id}` : `${API_BASE_URL}/admin/programs`;
            const method = id ? 'PUT' : 'POST';

            const response = await fetch(url, {
                method: method,
                headers: headers,
                body: body
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Failed to save program');
            }

            showToast(id ? 'Program updated successfully' : 'Program created successfully', 'success');
            closeModal();
            loadPrograms(currentPage);
        } catch (error) {
            showToast(error.message || 'Failed to save program', 'error');
        } finally {
            hideLoading();
        }
    }

    async function deleteProgram(id) {
        if (!confirm('Are you sure you want to delete this program?')) return;

        try {
            showLoading();
            await apiRequest(`/admin/programs/${id}`, 'DELETE');
            showToast('Program deleted successfully', 'success');
            loadPrograms(currentPage);
        } catch (error) {
            showToast('Failed to delete program', 'error');
        } finally {
            hideLoading();
        }
    }

    function closeModal() {
        document.getElementById('programModal').classList.remove('active');
    }

    function searchPrograms() {
        const search = document.getElementById('search').value.toLowerCase();
        const filtered = allPrograms.filter(p =>
            p.name.toLowerCase().includes(search) ||
            (p.university && p.university.name.toLowerCase().includes(search))
        );
        renderPrograms(filtered);
    }

    // Image preview functionality
    document.addEventListener('DOMContentLoaded', () => {
        loadPrograms();

        // File input preview
        document.getElementById('image_file').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview_img').src = e.target.result;
                    document.getElementById('image_preview').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
                // Clear URL input
                document.getElementById('image_url').value = '';
            }
        });

        // URL input preview
        document.getElementById('image_url').addEventListener('input', function(e) {
            const url = e.target.value;
            if (url) {
                document.getElementById('preview_img').src = url;
                document.getElementById('image_preview').classList.remove('hidden');
                // Clear file input
                document.getElementById('image_file').value = '';
            }
        });
    });
</script>
@endpush
