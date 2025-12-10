@extends('layouts.admin')

@section('page-title', 'Testimonials Management')

@section('admin-content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            <i class="fas fa-quote-left text-indigo-600 mr-3"></i>
            Testimonials Management
        </h2>
        <p class="text-gray-600 mt-1">Manage student success stories and testimonials</p>
    </div>
    <button onclick="openCreateModal()" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center space-x-2">
        <i class="fas fa-plus"></i>
        <span>Add Testimonial</span>
    </button>
</div>

<!-- Filters -->
<div class="mb-6 bg-white rounded-lg shadow-sm p-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <input
                type="text"
                id="search"
                placeholder="🔍 Search by student name..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                onkeyup="searchTestimonials()"
            >
        </div>
        <div>
            <select id="program-filter" onchange="filterTestimonials()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">📚 All Programs</option>
            </select>
        </div>
        <div>
            <select id="rating-filter" onchange="filterTestimonials()" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">⭐ All Ratings</option>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
        </div>
    </div>
</div>

<!-- Testimonials Grid -->
<div id="testimonials-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Will be populated by AJAX -->
</div>

<!-- Empty State -->
<div id="empty-state" class="hidden text-center py-20">
    <div class="text-gray-300 mb-6">
        <i class="fas fa-quote-left text-9xl"></i>
    </div>
    <h3 class="text-3xl font-bold text-gray-700 mb-4">No Testimonials Yet</h3>
    <p class="text-xl text-gray-600 mb-8">Start adding student success stories!</p>
    <button onclick="openCreateModal()" class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full font-bold hover:shadow-xl transform hover:scale-105 transition-all">
        <i class="fas fa-plus mr-2"></i>Add First Testimonial
    </button>
</div>

<!-- Create/Edit Modal -->
<div id="testimonialModal" class="modal">
    <div class="bg-white rounded-lg p-8 max-w-3xl w-full max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 id="modal-title" class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-quote-left text-indigo-600 mr-3"></i>
                <span>Add Testimonial</span>
            </h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="testimonialForm" onsubmit="handleSubmit(event)">
            <input type="hidden" id="testimonial-id">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Student Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-user text-indigo-600 mr-2"></i>Student Name *
                    </label>
                    <input
                        type="text"
                        id="student_name"
                        required
                        placeholder="e.g., Rajesh Kumar"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                </div>

                <!-- Program -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-graduation-cap text-indigo-600 mr-2"></i>Program *
                    </label>
                    <select
                        id="program_id"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                        <option value="">Select Program</option>
                    </select>
                </div>

                <!-- Before Role -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-briefcase text-gray-600 mr-2"></i>Before Role
                    </label>
                    <input
                        type="text"
                        id="before_role"
                        placeholder="e.g., Marketing Executive"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                </div>

                <!-- After Role -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-briefcase text-green-600 mr-2"></i>After Role
                    </label>
                    <input
                        type="text"
                        id="after_role"
                        placeholder="e.g., Marketing Manager"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                </div>

                <!-- Rating -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-star text-yellow-500 mr-2"></i>Rating *
                    </label>
                    <select
                        id="rating"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                        <option value="">Select Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ (5 Stars)</option>
                        <option value="4">⭐⭐⭐⭐ (4 Stars)</option>
                        <option value="3">⭐⭐⭐ (3 Stars)</option>
                        <option value="2">⭐⭐ (2 Stars)</option>
                        <option value="1">⭐ (1 Star)</option>
                    </select>
                </div>

                <!-- Company -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-building text-indigo-600 mr-2"></i>Company
                    </label>
                    <input
                        type="text"
                        id="company"
                        placeholder="e.g., Google, Microsoft"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                </div>

                <!-- Message/Testimonial -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-comment-dots text-indigo-600 mr-2"></i>Testimonial Message *
                    </label>
                    <textarea
                        id="message"
                        rows="5"
                        required
                        placeholder="Share the student's success story and experience..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    ></textarea>
                    <p class="text-xs text-gray-500 mt-1">
                        <i class="fas fa-info-circle mr-1"></i>Write a compelling testimonial that highlights the student's journey
                    </p>
                </div>

                <!-- Is Featured -->
                <div class="md:col-span-2">
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input
                            type="checkbox"
                            id="is_featured"
                            class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                        >
                        <span class="text-sm font-bold text-gray-700">
                            <i class="fas fa-star text-yellow-500 mr-2"></i>Feature this testimonial on homepage
                        </span>
                    </label>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-3">
                <button
                    type="button"
                    onclick="closeModal()"
                    class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-semibold transition"
                >
                    <i class="fas fa-times mr-2"></i>Cancel
                </button>
                <button
                    type="submit"
                    class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:shadow-xl transform hover:scale-105 transition-all font-bold"
                >
                    <i class="fas fa-save mr-2"></i>Save Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let allTestimonials = [];
    let filteredTestimonials = [];

    async function loadTestimonials() {
        try {
            showLoading();
            const response = await apiRequest('/programs', 'GET', null, false);

            if (response.success) {
                // Get all testimonials from all programs
                const programs = response.data.data || [];
                allTestimonials = [];

                // Fetch testimonials for each program
                for (const program of programs) {
                    try {
                        const testResponse = await apiRequest(`/programs/${program.id}/testimonials`, 'GET', null, false);
                        if (testResponse.success && testResponse.data) {
                            testResponse.data.forEach(testimonial => {
                                allTestimonials.push({
                                    ...testimonial,
                                    program: program
                                });
                            });
                        }
                    } catch (error) {
                        console.error(`Failed to load testimonials for program ${program.id}:`, error);
                    }
                }

                filteredTestimonials = [...allTestimonials];
                renderTestimonials(filteredTestimonials);
            }
        } catch (error) {
            showToast('Failed to load testimonials', 'error');
            console.error('Error:', error);
        } finally {
            hideLoading();
        }
    }

    async function loadPrograms() {
        try {
            const response = await apiRequest('/programs', 'GET', null, false);
            if (response.success) {
                const programs = response.data.data || [];
                const programSelect = document.getElementById('program_id');
                const filterSelect = document.getElementById('program-filter');

                programSelect.innerHTML = '<option value="">Select Program</option>';
                filterSelect.innerHTML = '<option value="">📚 All Programs</option>';

                programs.forEach(program => {
                    programSelect.innerHTML += `<option value="${program.id}">${program.name}</option>`;
                    filterSelect.innerHTML += `<option value="${program.id}">${program.name}</option>`;
                });
            }
        } catch (error) {
            console.error('Failed to load programs:', error);
        }
    }

    function renderTestimonials(testimonials) {
        const grid = document.getElementById('testimonials-grid');
        const emptyState = document.getElementById('empty-state');

        grid.innerHTML = '';

        if (testimonials.length === 0) {
            grid.classList.add('hidden');
            emptyState.classList.remove('hidden');
            return;
        }

        grid.classList.remove('hidden');
        emptyState.classList.add('hidden');

        testimonials.forEach((testimonial, index) => {
            const stars = '⭐'.repeat(testimonial.rating || 5);
            const card = document.createElement('div');
            card.className = 'bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 p-6 border-l-4 border-indigo-600';

            card.innerHTML = `
                <!-- Header -->
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xl font-bold shadow-lg">
                            ${testimonial.student_name ? testimonial.student_name.charAt(0).toUpperCase() : 'S'}
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">${testimonial.student_name || 'Anonymous'}</h3>
                            <p class="text-sm text-gray-600">${testimonial.program ? testimonial.program.name : 'N/A'}</p>
                        </div>
                    </div>
                    ${testimonial.is_featured ? '<span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full"><i class="fas fa-star mr-1"></i>Featured</span>' : ''}
                </div>

                <!-- Rating -->
                <div class="mb-3">
                    <span class="text-yellow-500 text-lg">${stars}</span>
                </div>

                <!-- Career Transition -->
                ${testimonial.before_role && testimonial.after_role ? `
                    <div class="mb-4 p-3 bg-gradient-to-r from-gray-50 to-indigo-50 rounded-lg">
                        <p class="text-sm font-semibold text-gray-700">
                            <i class="fas fa-arrow-right text-green-600 mr-2"></i>
                            ${testimonial.before_role} → ${testimonial.after_role}
                        </p>
                    </div>
                ` : ''}

                <!-- Message -->
                <p class="text-gray-700 italic mb-4 line-clamp-4">
                    "${testimonial.message || 'No message provided'}"
                </p>

                <!-- Company -->
                ${testimonial.company ? `
                    <p class="text-sm text-gray-600 mb-4">
                        <i class="fas fa-building text-indigo-600 mr-2"></i>${testimonial.company}
                    </p>
                ` : ''}

                <!-- Actions -->
                <div class="flex justify-end space-x-2 pt-4 border-t border-gray-200">
                    <button
                        onclick="editTestimonial(${testimonial.id})"
                        class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition font-semibold"
                    >
                        <i class="fas fa-edit mr-1"></i>Edit
                    </button>
                    <button
                        onclick="deleteTestimonial(${testimonial.id})"
                        class="px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition font-semibold"
                    >
                        <i class="fas fa-trash mr-1"></i>Delete
                    </button>
                </div>
            `;

            grid.appendChild(card);
        });
    }

    function openCreateModal() {
        document.getElementById('modal-title').innerHTML = '<i class="fas fa-plus text-indigo-600 mr-3"></i><span>Add Testimonial</span>';
        document.getElementById('testimonialForm').reset();
        document.getElementById('testimonial-id').value = '';
        document.getElementById('testimonialModal').classList.add('active');
        loadPrograms();
    }

    async function editTestimonial(id) {
        const testimonial = allTestimonials.find(t => t.id === id);
        if (!testimonial) {
            showToast('Testimonial not found', 'error');
            return;
        }

        document.getElementById('modal-title').innerHTML = '<i class="fas fa-edit text-indigo-600 mr-3"></i><span>Edit Testimonial</span>';
        document.getElementById('testimonial-id').value = testimonial.id;
        document.getElementById('student_name').value = testimonial.student_name || '';
        document.getElementById('before_role').value = testimonial.before_role || '';
        document.getElementById('after_role').value = testimonial.after_role || '';
        document.getElementById('rating').value = testimonial.rating || '';
        document.getElementById('company').value = testimonial.company || '';
        document.getElementById('message').value = testimonial.message || '';
        document.getElementById('is_featured').checked = testimonial.is_featured || false;

        await loadPrograms();
        document.getElementById('program_id').value = testimonial.program_id || '';

        document.getElementById('testimonialModal').classList.add('active');
    }

    async function handleSubmit(event) {
        event.preventDefault();

        const id = document.getElementById('testimonial-id').value;
        const data = {
            student_name: document.getElementById('student_name').value,
            program_id: parseInt(document.getElementById('program_id').value),
            before_role: document.getElementById('before_role').value,
            after_role: document.getElementById('after_role').value,
            rating: parseInt(document.getElementById('rating').value),
            company: document.getElementById('company').value,
            message: document.getElementById('message').value,
            is_featured: document.getElementById('is_featured').checked
        };

        try {
            showLoading();

            if (id) {
                await apiRequest(`/admin/testimonials/${id}`, 'PUT', data);
                showToast('Testimonial updated successfully! ✨', 'success');
            } else {
                await apiRequest('/admin/testimonials', 'POST', data);
                showToast('Testimonial created successfully! 🎉', 'success');
            }

            closeModal();
            loadTestimonials();
        } catch (error) {
            showToast(error.message || 'Failed to save testimonial', 'error');
        } finally {
            hideLoading();
        }
    }

    async function deleteTestimonial(id) {
        if (!confirm('Are you sure you want to delete this testimonial? This action cannot be undone.')) return;

        try {
            showLoading();
            await apiRequest(`/admin/testimonials/${id}`, 'DELETE');
            showToast('Testimonial deleted successfully! 🗑️', 'success');
            loadTestimonials();
        } catch (error) {
            showToast('Failed to delete testimonial', 'error');
        } finally {
            hideLoading();
        }
    }

    function closeModal() {
        document.getElementById('testimonialModal').classList.remove('active');
    }

    function searchTestimonials() {
        const search = document.getElementById('search').value.toLowerCase();
        const programId = document.getElementById('program-filter').value;
        const rating = document.getElementById('rating-filter').value;

        filteredTestimonials = allTestimonials.filter(testimonial => {
            const matchSearch = !search ||
                (testimonial.student_name && testimonial.student_name.toLowerCase().includes(search)) ||
                (testimonial.message && testimonial.message.toLowerCase().includes(search)) ||
                (testimonial.company && testimonial.company.toLowerCase().includes(search));

            const matchProgram = !programId || testimonial.program_id == programId;
            const matchRating = !rating || testimonial.rating == rating;

            return matchSearch && matchProgram && matchRating;
        });

        renderTestimonials(filteredTestimonials);
    }

    function filterTestimonials() {
        searchTestimonials();
    }

    // Load data on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadTestimonials();
        loadPrograms();
    });
</script>
@endpush
