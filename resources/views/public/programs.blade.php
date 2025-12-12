@extends('layouts.app')

@section('title', 'Programs - Digivarsity')

@section('content')
<style>
    /* Modern Clean Styles */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }

    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }

    .animate-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .animate-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Modern Card */
    .modern-card {
        background: white;
        border-radius: 1.5rem;
        padding: 0;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border-color: rgba(33, 150, 243, 0.3);
    }

    /* Gradient Text - Blue Theme */
    .gradient-text {
        background: linear-gradient(135deg, #2196F3 0%, #1976D2 50%, #0D47A1 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Modern Button */
    .modern-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .modern-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    .modern-btn:hover::before {
        left: 100%;
    }

    .modern-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -5px rgba(33, 150, 243, 0.5);
    }

    /* Hero Background - Black & Blue Theme */
    .hero-modern {
        background: linear-gradient(135deg, #000000 0%, #0D47A1 50%, #1976D2 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-modern::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(33, 150, 243, 0.3) 0%, transparent 70%);
        top: -250px;
        right: -250px;
        animation: float 8s ease-in-out infinite;
    }

    .hero-modern::after {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(25, 118, 210, 0.2) 0%, transparent 70%);
        bottom: -200px;
        left: -200px;
        animation: float 10s ease-in-out infinite reverse;
    }

    /* Filter Sidebar */
    .filter-sidebar {
        position: sticky;
        top: 100px;
        max-height: calc(100vh - 120px);
        overflow-y: auto;
    }

    .filter-sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .filter-sidebar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .filter-sidebar::-webkit-scrollbar-thumb {
        background: #2196F3;
        border-radius: 10px;
    }

    .filter-item {
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .filter-item:hover {
        background: #f0f9ff;
        transform: translateX(4px);
    }

    .filter-item.active {
        background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
        color: white;
        font-weight: 700;
    }

    /* Mobile Filter Toggle */
    .mobile-filter-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 50;
        box-shadow: 0 10px 30px rgba(33, 150, 243, 0.4);
    }

    @media (min-width: 1024px) {
        .mobile-filter-btn {
            display: none;
        }
    }

    /* Pagination */
    .pagination-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.2s;
    }

    .pagination-btn:hover:not(:disabled) {
        background: #2196F3;
        color: white;
        transform: scale(1.1);
    }

    .pagination-btn.active {
        background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
        color: white;
    }

    .pagination-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }
</style>

<!-- Navigation -->
@include('components.navbar')

<!-- Hero Section -->
<section class="hero-modern text-white py-16 lg:py-20 relative">
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full mb-6">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-semibold">🎓 World-Class Programs</span>
            </div>

            <h1 class="text-4xl lg:text-6xl font-black mb-4 leading-tight">
                Explore Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-400 to-blue-500">Programs</span>
            </h1>

            <p class="text-lg lg:text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                Find the perfect program to advance your career with flexible learning options
            </p>
        </div>
    </div>
</section>

<!-- Search Bar Section -->
<section class="bg-white py-8 shadow-md sticky top-0 z-40">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="relative">
                <input
                    type="text"
                    id="search"
                    placeholder="🔍 Search programs by name, university, or keyword..."
                    class="w-full px-6 py-4 pr-14 border-2 border-gray-200 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base shadow-lg transition-all"
                    onkeyup="filterPrograms()"
                >
                <i class="fas fa-search absolute right-6 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="py-8 bg-gradient-to-br from-gray-50 via-blue-50 to-white min-h-screen">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-6">
            
            <!-- Left Sidebar - Filters -->
            <aside class="lg:w-80 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-lg p-6 filter-sidebar">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-black text-gray-900 flex items-center gap-2">
                            <i class="fas fa-filter text-blue-600"></i>
                            Filters
                        </h3>
                        <button onclick="resetFilters()" class="text-sm text-blue-600 hover:text-blue-700 font-semibold">
                            Reset
                        </button>
                    </div>

                    <!-- Program Type Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-bold text-gray-700 mb-3 uppercase tracking-wide">Program Type</h4>
                        <div class="space-y-2">
                            <div onclick="filterByType('')" class="filter-item active px-4 py-3 rounded-xl flex items-center justify-between" id="filter-all">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-th-large text-lg"></i>
                                    <span class="font-semibold">All Programs</span>
                                </div>
                                <span class="px-2 py-1 bg-white/30 rounded-lg text-xs font-bold" id="count-all">0</span>
                            </div>
                            <div onclick="filterByType('online')" class="filter-item px-4 py-3 rounded-xl flex items-center justify-between" id="filter-online">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-laptop text-lg text-blue-600"></i>
                                    <span class="font-semibold">Online</span>
                                </div>
                                <span class="px-2 py-1 bg-blue-100 rounded-lg text-xs font-bold text-blue-700" id="count-online">0</span>
                            </div>
                            <div onclick="filterByType('odl')" class="filter-item px-4 py-3 rounded-xl flex items-center justify-between" id="filter-odl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-book-open text-lg text-green-600"></i>
                                    <span class="font-semibold">ODL</span>
                                </div>
                                <span class="px-2 py-1 bg-green-100 rounded-lg text-xs font-bold text-green-700" id="count-odl">0</span>
                            </div>
                            <div onclick="filterByType('work-linked')" class="filter-item px-4 py-3 rounded-xl flex items-center justify-between" id="filter-work-linked">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-briefcase text-lg text-purple-600"></i>
                                    <span class="font-semibold">Work-Linked</span>
                                </div>
                                <span class="px-2 py-1 bg-purple-100 rounded-lg text-xs font-bold text-purple-700" id="count-work-linked">0</span>
                            </div>
                            <div onclick="filterByType('executive')" class="filter-item px-4 py-3 rounded-xl flex items-center justify-between" id="filter-executive">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-user-tie text-lg text-gray-600"></i>
                                    <span class="font-semibold">Executive</span>
                                </div>
                                <span class="px-2 py-1 bg-gray-100 rounded-lg text-xs font-bold text-gray-700" id="count-executive">0</span>
                            </div>
                        </div>
                    </div>

                    <!-- University Filter -->
                    <div class="mb-6">
                        <h4 class="text-sm font-bold text-gray-700 mb-3 uppercase tracking-wide">University</h4>
                        <select id="university-filter" onchange="filterPrograms()" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 font-semibold transition-all">
                            <option value="">🏛️ All Universities</option>
                        </select>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 border-2 border-blue-200">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-white"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-black text-blue-900" id="total-programs">0</p>
                                <p class="text-xs text-blue-700 font-semibold">Total Programs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <main class="flex-1 min-w-0">
                <!-- Top Bar - Results Count & Sort -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <h3 id="programs-count" class="text-2xl lg:text-3xl font-black text-gray-900">
                            Loading programs...
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">Discover your perfect program</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <label class="text-sm font-semibold text-gray-700">Sort:</label>
                        <select id="sort" onchange="sortPrograms()" class="px-4 py-2 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 font-semibold text-sm transition-all">
                            <option value="name">📝 Name</option>
                            <option value="fees-low">💰 Fees: Low to High</option>
                            <option value="fees-high">💎 Fees: High to Low</option>
                        </select>
                    </div>
                </div>

                <!-- Programs Grid -->
                <div id="programs-grid" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
                    <!-- Will be populated by AJAX -->
                </div>

                <!-- Pagination -->
                <div id="pagination" class="flex justify-center items-center gap-2 mt-8">
                    <!-- Will be populated by JavaScript -->
                </div>

                <!-- Empty State -->
                <div id="empty-state" class="hidden text-center py-20">
                    <div class="text-gray-300 mb-6">
                        <i class="fas fa-search text-8xl"></i>
                    </div>
                    <h3 class="text-3xl font-black text-gray-700 mb-3">No Programs Found</h3>
                    <p class="text-lg text-gray-600 mb-6">Try adjusting your filters or search terms</p>
                    <button onclick="resetFilters()" class="modern-btn bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 shadow-xl">
                        <i class="fas fa-redo"></i>
                        <span>Reset Filters</span>
                    </button>
                </div>
            </main>
        </div>
    </div>
</section>

<!-- Mobile Filter Button -->
<button onclick="toggleMobileFilters()" class="mobile-filter-btn lg:hidden modern-btn bg-blue-600 text-white w-14 h-14 rounded-full">
    <i class="fas fa-filter text-xl"></i>
</button>

<!-- Footer -->
@include('components.footer')
@endsection

@push('scripts')
<script>
    let allPrograms = [];
    let filteredPrograms = [];
    let currentPage = 1;
    let currentTypeFilter = '';
    const itemsPerPage = 9;

    // Filter by Type
    function filterByType(type) {
        currentTypeFilter = type;

        // Reset all filter items
        document.querySelectorAll('.filter-item').forEach(item => {
            item.classList.remove('active');
        });

        // Set active filter
        const activeFilter = document.getElementById(`filter-${type || 'all'}`);
        if (activeFilter) {
            activeFilter.classList.add('active');
        }

        currentPage = 1;
        filterPrograms();
    }

    // Reset Filters
    function resetFilters() {
        document.getElementById('search').value = '';
        document.getElementById('university-filter').value = '';
        document.getElementById('sort').value = 'name';
        currentPage = 1;
        filterByType('');
    }

    async function loadPrograms() {
        try {
            showLoading();
            const response = await apiRequest('/programs?per_page=100', 'GET', null, false);

            if (response.success) {
                allPrograms = response.data.data || response.data;
                filteredPrograms = [...allPrograms];
                updateTypeCounts();
                renderPrograms();
                updateCount();
                document.getElementById('total-programs').textContent = allPrograms.length;
            }
        } catch (error) {
            showToast('Failed to load programs', 'error');
        } finally {
            hideLoading();
        }
    }

    async function loadUniversities() {
        try {
            const response = await apiRequest('/universities', 'GET', null, false);
            if (response.success) {
                const select = document.getElementById('university-filter');
                response.data.forEach(uni => {
                    select.innerHTML += `<option value="${uni.id}">${uni.name}</option>`;
                });
            }
        } catch (error) {
            console.error('Failed to load universities:', error);
        }
    }

    // Update Type Counts
    function updateTypeCounts() {
        const counts = {
            all: allPrograms.length,
            online: allPrograms.filter(p => p.type === 'online').length,
            odl: allPrograms.filter(p => p.type === 'odl').length,
            'work-linked': allPrograms.filter(p => p.type === 'work-linked').length,
            executive: allPrograms.filter(p => p.type === 'executive').length
        };

        Object.keys(counts).forEach(type => {
            const countEl = document.getElementById(`count-${type}`);
            if (countEl) countEl.textContent = counts[type];
        });
    }

    // Render Pagination
    function renderPagination() {
        const totalPages = Math.ceil(filteredPrograms.length / itemsPerPage);
        const pagination = document.getElementById('pagination');
        
        if (totalPages <= 1) {
            pagination.innerHTML = '';
            return;
        }

        let html = '';
        
        // Previous button
        html += `<button onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''} class="pagination-btn bg-white border-2 border-gray-200">
            <i class="fas fa-chevron-left"></i>
        </button>`;

        // Page numbers
        const maxVisible = 5;
        let startPage = Math.max(1, currentPage - Math.floor(maxVisible / 2));
        let endPage = Math.min(totalPages, startPage + maxVisible - 1);
        
        if (endPage - startPage < maxVisible - 1) {
            startPage = Math.max(1, endPage - maxVisible + 1);
        }

        if (startPage > 1) {
            html += `<button onclick="changePage(1)" class="pagination-btn bg-white border-2 border-gray-200">1</button>`;
            if (startPage > 2) {
                html += `<span class="px-2 text-gray-500">...</span>`;
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            html += `<button onclick="changePage(${i})" class="pagination-btn ${i === currentPage ? 'active' : 'bg-white border-2 border-gray-200'}">${i}</button>`;
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                html += `<span class="px-2 text-gray-500">...</span>`;
            }
            html += `<button onclick="changePage(${totalPages})" class="pagination-btn bg-white border-2 border-gray-200">${totalPages}</button>`;
        }

        // Next button
        html += `<button onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''} class="pagination-btn bg-white border-2 border-gray-200">
            <i class="fas fa-chevron-right"></i>
        </button>`;

        pagination.innerHTML = html;
    }

    function changePage(page) {
        const totalPages = Math.ceil(filteredPrograms.length / itemsPerPage);
        if (page < 1 || page > totalPages) return;
        
        currentPage = page;
        renderPrograms();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function renderPrograms() {
        const grid = document.getElementById('programs-grid');
        const emptyState = document.getElementById('empty-state');

        grid.innerHTML = '';

        if (filteredPrograms.length === 0) {
            grid.classList.add('hidden');
            emptyState.classList.remove('hidden');
            document.getElementById('pagination').innerHTML = '';
            return;
        }

        grid.classList.remove('hidden');
        emptyState.classList.add('hidden');

        // Paginate programs
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const paginatedPrograms = filteredPrograms.slice(startIndex, endIndex);

        paginatedPrograms.forEach((program, index) => {
            const typeColors = {
                'online': { bg: 'bg-blue-500', text: 'text-blue-700', badge: 'bg-blue-50 border-2 border-blue-200' },
                'odl': { bg: 'bg-green-500', text: 'text-green-700', badge: 'bg-green-50 border-2 border-green-200' },
                'work-linked': { bg: 'bg-blue-700', text: 'text-blue-800', badge: 'bg-blue-50 border-2 border-blue-300' },
                'executive': { bg: 'bg-gray-600', text: 'text-gray-700', badge: 'bg-gray-50 border-2 border-gray-300' }
            };
            const colors = typeColors[program.type] || { bg: 'bg-gray-500', text: 'text-gray-700', badge: 'bg-gray-50 border-2 border-gray-200' };

            const card = document.createElement('div');
            card.className = 'modern-card animate-on-scroll';
            card.style.animationDelay = `${index * 0.05}s`;

            card.innerHTML = `
                <!-- Program Image -->
                <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 relative overflow-hidden group">
                    ${program.image_url ?
                        `<img src="${program.image_url}" alt="${program.name}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">` :
                        `<div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-6xl opacity-40 group-hover:scale-110 group-hover:opacity-60 transition-all duration-500"></i>
                        </div>`
                    }
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                    <!-- Type Badge -->
                    <div class="absolute top-3 right-3">
                        <span class="px-3 py-1.5 ${colors.badge} ${colors.text} text-xs font-bold rounded-lg uppercase shadow-lg backdrop-blur-sm">
                            ${program.type}
                        </span>
                    </div>

                    <!-- Active Badge -->
                    ${program.is_active ? `
                        <div class="absolute top-3 left-3">
                            <span class="px-2 py-1 bg-green-500 text-white text-xs font-bold rounded-lg shadow-lg flex items-center gap-1">
                                <i class="fas fa-check-circle text-xs"></i>
                                <span>Active</span>
                            </span>
                        </div>
                    ` : ''}
                </div>

                <div class="p-5 flex-1 flex flex-col">
                    <!-- Program Title -->
                    <h3 class="text-xl font-black text-gray-900 mb-3 line-clamp-2 leading-tight">${program.name}</h3>

                    <!-- University -->
                    <div class="flex items-center text-gray-700 mb-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center mr-2">
                            <i class="fas fa-university text-white text-xs"></i>
                        </div>
                        <span class="font-semibold text-sm">${program.university ? program.university.name : 'N/A'}</span>
                    </div>

                    <!-- Details -->
                    <div class="space-y-2 mb-4">
                        ${program.duration ? `
                            <div class="flex items-center text-gray-600 text-sm">
                                <i class="fas fa-clock mr-2 text-green-600 w-4"></i>
                                <span>${program.duration}</span>
                            </div>
                        ` : ''}
                        ${program.mode ? `
                            <div class="flex items-center text-gray-600 text-sm">
                                <i class="fas fa-laptop mr-2 text-purple-600 w-4"></i>
                                <span>${program.mode}</span>
                            </div>
                        ` : ''}
                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed flex-1">${program.description || 'Comprehensive program designed for career growth'}</p>

                    <!-- Footer -->
                    <div class="border-t-2 border-gray-100 pt-4 flex justify-between items-center mt-auto">
                        <div>
                            <p class="text-xs text-gray-500 mb-1 font-semibold">Fees</p>
                            <p class="text-2xl font-black gradient-text">
                                ${formatCurrency(program.fees)}
                            </p>
                        </div>
                        <a href="/programs/${program.id}" class="modern-btn bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 text-sm shadow-lg">
                            <span>View</span>
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            `;

            grid.appendChild(card);
        });

        renderPagination();

        // Trigger animations
        setTimeout(() => {
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                el.classList.add('visible');
            });
        }, 100);
    }

    function filterPrograms() {
        const search = document.getElementById('search').value.toLowerCase();
        const universityId = document.getElementById('university-filter').value;

        filteredPrograms = allPrograms.filter(program => {
            const matchSearch = !search ||
                program.name.toLowerCase().includes(search) ||
                (program.description && program.description.toLowerCase().includes(search)) ||
                (program.university && program.university.name.toLowerCase().includes(search));

            const matchType = !currentTypeFilter || program.type === currentTypeFilter;
            const matchUniversity = !universityId || program.university_id == universityId;

            return matchSearch && matchType && matchUniversity;
        });

        currentPage = 1;
        sortPrograms();
        updateCount();
    }

    function sortPrograms() {
        const sort = document.getElementById('sort').value;

        if (sort === 'name') {
            filteredPrograms.sort((a, b) => a.name.localeCompare(b.name));
        } else if (sort === 'fees-low') {
            filteredPrograms.sort((a, b) => (a.fees || 0) - (b.fees || 0));
        } else if (sort === 'fees-high') {
            filteredPrograms.sort((a, b) => (b.fees || 0) - (a.fees || 0));
        }

        renderPrograms();
    }

    function updateCount() {
        const count = filteredPrograms.length;
        const total = allPrograms.length;
        const typeText = currentTypeFilter ? ` ${currentTypeFilter.toUpperCase()}` : '';

        document.getElementById('programs-count').innerHTML = `
            <span class="text-blue-600">${count}</span>${typeText} Program${count !== 1 ? 's' : ''}
            ${count !== total ? `<span class="text-gray-500 text-base"> of ${total}</span>` : ''}
        `;
    }

    // Mobile Filter Toggle
    function toggleMobileFilters() {
        const sidebar = document.querySelector('.filter-sidebar');
        const parent = sidebar.parentElement;
        
        if (parent.classList.contains('hidden')) {
            parent.classList.remove('hidden');
            parent.classList.add('fixed', 'inset-0', 'z-50', 'bg-white', 'overflow-y-auto', 'p-4');
            
            // Add close button
            const closeBtn = document.createElement('button');
            closeBtn.innerHTML = '<i class="fas fa-times"></i>';
            closeBtn.className = 'absolute top-4 right-4 w-10 h-10 bg-red-500 text-white rounded-full flex items-center justify-center';
            closeBtn.onclick = toggleMobileFilters;
            parent.insertBefore(closeBtn, sidebar);
        } else {
            parent.classList.add('hidden');
            parent.classList.remove('fixed', 'inset-0', 'z-50', 'bg-white', 'overflow-y-auto', 'p-4');
            const closeBtn = parent.querySelector('button');
            if (closeBtn) closeBtn.remove();
        }
    }

    // Load data on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadPrograms();
        loadUniversities();

        // Scroll Animation Observer
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe initial elements
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Make sidebar responsive on mobile
        const mediaQuery = window.matchMedia('(max-width: 1023px)');
        const sidebar = document.querySelector('.filter-sidebar');
        
        function handleMobileView(e) {
            if (e.matches && sidebar) {
                sidebar.parentElement.classList.add('hidden');
            } else if (sidebar) {
                sidebar.parentElement.classList.remove('hidden', 'fixed', 'inset-0', 'z-50', 'bg-white', 'overflow-y-auto', 'p-4');
            }
        }
        
        mediaQuery.addListener(handleMobileView);
        handleMobileView(mediaQuery);
    });
</script>
@endpush
