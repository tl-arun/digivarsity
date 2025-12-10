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
        gap: 0.5rem;
        padding: 1rem 2rem;
        border-radius: 9999px;
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

    .type-btn {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .type-btn:hover {
        transform: translateY(-2px);
    }

    .type-btn.active {
        transform: scale(1.05);
    }
</style>

<!-- Navigation -->
@include('components.navbar')

<!-- Hero Section -->
<section class="hero-modern text-white py-24 lg:py-32 relative">
    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-5xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md px-6 py-3 rounded-full mb-8 animate-on-scroll">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-semibold">🎓 10+ World-Class Programs Available</span>
            </div>

            <!-- Heading -->
            <h1 class="text-5xl lg:text-7xl font-black mb-6 leading-tight animate-on-scroll" style="animation-delay: 0.1s">
                Explore Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-400 to-blue-500">Programs</span>
            </h1>

            <!-- Subheading -->
            <p class="text-xl lg:text-2xl text-gray-200 mb-6 max-w-3xl mx-auto animate-on-scroll" style="animation-delay: 0.2s">
                Find the perfect program to advance your career
            </p>

            <p class="text-lg text-gray-300 mb-12 max-w-3xl mx-auto animate-on-scroll" style="animation-delay: 0.3s">
                Choose from <span class="font-bold text-white">Online, ODL, Work-Linked,</span> and <span class="font-bold text-white">Executive</span> programs from top universities
            </p>

            <!-- Trust Indicators -->
            <div class="flex flex-wrap justify-center items-center gap-8 text-sm text-gray-300 animate-on-scroll" style="animation-delay: 0.4s">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-check-circle text-green-400"></i>
                    <span>Industry Recognized</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-check-circle text-green-400"></i>
                    <span>Flexible Learning</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-check-circle text-green-400"></i>
                    <span>100% Placement Support</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-white/50 text-2xl"></i>
    </div>
</section>

<!-- Program Type Filter Buttons -->
<section class="bg-white py-12 shadow-lg">
    <div class="container mx-auto px-6 lg:px-8">
        <!-- Search Bar -->
        <div class="mb-8">
            <div class="relative max-w-3xl mx-auto">
                <input
                    type="text"
                    id="search"
                    placeholder="🔍 Search programs by name, university, or keyword..."
                    class="w-full px-8 py-5 pr-14 border-2 border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-lg shadow-xl transition-all"
                    onkeyup="filterPrograms()"
                >
                <i class="fas fa-search absolute right-8 top-1/2 transform -translate-y-1/2 text-gray-400 text-xl"></i>
            </div>
        </div>

        <!-- Type Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <button onclick="filterByType('')" class="modern-btn type-btn active bg-blue-600 hover:bg-blue-700 text-white shadow-xl hover:shadow-2xl" id="btn-all">
                <i class="fas fa-th-large"></i>
                <span>All Programs</span>
                <span class="bg-white/30 px-3 py-1 rounded-full text-xs font-bold" id="count-all">0</span>
            </button>
            <button onclick="filterByType('online')" class="modern-btn type-btn bg-blue-50 text-blue-700 border-2 border-blue-200 hover:bg-blue-100" id="btn-online">
                <i class="fas fa-laptop"></i>
                <span>Online</span>
                <span class="bg-blue-200 px-3 py-1 rounded-full text-xs font-bold" id="count-online">0</span>
            </button>
            <button onclick="filterByType('odl')" class="modern-btn type-btn bg-green-50 text-green-700 border-2 border-green-200 hover:bg-green-100" id="btn-odl">
                <i class="fas fa-book-open"></i>
                <span>ODL</span>
                <span class="bg-green-200 px-3 py-1 rounded-full text-xs font-bold" id="count-odl">0</span>
            </button>
            <button onclick="filterByType('work-linked')" class="modern-btn type-btn bg-blue-50 text-blue-800 border-2 border-blue-300 hover:bg-blue-100" id="btn-work-linked">
                <i class="fas fa-briefcase"></i>
                <span>Work-Linked</span>
                <span class="bg-blue-300 px-3 py-1 rounded-full text-xs font-bold" id="count-work-linked">0</span>
            </button>
            <button onclick="filterByType('executive')" class="modern-btn type-btn bg-gray-50 text-gray-700 border-2 border-gray-300 hover:bg-gray-100" id="btn-executive">
                <i class="fas fa-user-tie"></i>
                <span>Executive</span>
                <span class="bg-gray-300 px-3 py-1 rounded-full text-xs font-bold" id="count-executive">0</span>
            </button>
        </div>

        <!-- Additional Filters -->
        <div class="flex flex-wrap justify-center gap-4">
            <select id="university-filter" onchange="filterPrograms()" class="px-6 py-3 border-2 border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 font-semibold shadow-lg transition-all hover:border-blue-300">
                <option value="">🏛️ All Universities</option>
            </select>
            <select id="sort" onchange="sortPrograms()" class="px-6 py-3 border-2 border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 font-semibold shadow-lg transition-all hover:border-blue-300">
                <option value="name">📝 Sort by Name</option>
                <option value="fees-low">💰 Fees: Low to High</option>
                <option value="fees-high">💎 Fees: High to Low</option>
            </select>
        </div>
    </div>
</section>

<!-- Programs Grid -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-blue-50 to-white">
    <div class="container mx-auto px-6 lg:px-8">
        <!-- Results Count -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 animate-on-scroll">
            <div>
                <h3 id="programs-count" class="text-3xl lg:text-4xl font-black text-gray-900 mb-2">
                    Loading programs...
                </h3>
                <p class="text-lg text-gray-600">Discover your perfect program</p>
            </div>
            <div class="hidden md:flex items-center space-x-3 bg-white px-6 py-3 rounded-full shadow-lg">
                <i class="fas fa-filter text-blue-600"></i>
                <span class="font-semibold text-gray-700">Filtered Results</span>
            </div>
        </div>

        <!-- Programs Grid -->
        <div id="programs-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Will be populated by AJAX -->
        </div>

        <!-- Empty State -->
        <div id="empty-state" class="hidden text-center py-20">
            <div class="text-gray-300 mb-8">
                <i class="fas fa-search text-9xl"></i>
            </div>
            <h3 class="text-4xl font-black text-gray-700 mb-4">No Programs Found</h3>
            <p class="text-xl text-gray-600 mb-8">Try adjusting your filters or search terms</p>
            <button onclick="resetFilters()" class="modern-btn bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 text-lg shadow-xl">
                <i class="fas fa-redo"></i>
                <span>Reset Filters</span>
            </button>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.footer')
@endsection

@push('scripts')
<script>
    let allPrograms = [];
    let filteredPrograms = [];
    let currentPage = 1;
    let currentTypeFilter = '';

    // Filter by Type
    function filterByType(type) {
        currentTypeFilter = type;

        // Reset all buttons to default state
        document.querySelectorAll('.type-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-gradient-to-r', 'from-indigo-600', 'to-purple-600', 'text-white', 'shadow-2xl');

            const btnId = btn.id;
            if (btnId === 'btn-online') {
                btn.className = 'modern-btn type-btn bg-blue-50 text-blue-700 border-2 border-blue-200 hover:bg-blue-100';
            } else if (btnId === 'btn-odl') {
                btn.className = 'modern-btn type-btn bg-green-50 text-green-700 border-2 border-green-200 hover:bg-green-100';
            } else if (btnId === 'btn-work-linked') {
                btn.className = 'modern-btn type-btn bg-blue-50 text-blue-800 border-2 border-blue-300 hover:bg-blue-100';
            } else if (btnId === 'btn-executive') {
                btn.className = 'modern-btn type-btn bg-gray-50 text-gray-700 border-2 border-gray-300 hover:bg-gray-100';
            } else if (btnId === 'btn-all') {
                btn.className = 'modern-btn type-btn bg-blue-600 hover:bg-blue-700 text-white shadow-xl hover:shadow-2xl';
            }
        });

        // Set active button
        const activeBtn = document.getElementById(`btn-${type || 'all'}`);
        if (activeBtn) {
            activeBtn.classList.add('active');
            if (type) {
                // Make the selected type button blue
                activeBtn.className = 'modern-btn type-btn active bg-blue-600 hover:bg-blue-700 text-white shadow-xl hover:shadow-2xl';
            }
        }

        filterPrograms();
    }

    // Reset Filters
    function resetFilters() {
        document.getElementById('search').value = '';
        document.getElementById('university-filter').value = '';
        document.getElementById('sort').value = 'name';
        filterByType('');
    }

    async function loadPrograms(page = 1) {
        try {
            showLoading();
            const response = await apiRequest(`/programs?page=${page}&per_page=50`, 'GET', null, false);

            if (response.success) {
                allPrograms = response.data.data;
                filteredPrograms = [...allPrograms];
                updateTypeCounts();
                renderPrograms(filteredPrograms);
                updateCount();
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

    function renderPrograms(programs) {
        const grid = document.getElementById('programs-grid');
        const emptyState = document.getElementById('empty-state');

        grid.innerHTML = '';

        if (programs.length === 0) {
            grid.classList.add('hidden');
            emptyState.classList.remove('hidden');
            return;
        }

        grid.classList.remove('hidden');
        emptyState.classList.add('hidden');

        programs.forEach((program, index) => {
            const typeColors = {
                'online': { bg: 'bg-blue-500', text: 'text-blue-700', badge: 'bg-blue-50 border-2 border-blue-200' },
                'odl': { bg: 'bg-green-500', text: 'text-green-700', badge: 'bg-green-50 border-2 border-green-200' },
                'work-linked': { bg: 'bg-blue-700', text: 'text-blue-800', badge: 'bg-blue-50 border-2 border-blue-300' },
                'executive': { bg: 'bg-gray-600', text: 'text-gray-700', badge: 'bg-gray-50 border-2 border-gray-300' }
            };
            const colors = typeColors[program.type] || { bg: 'bg-gray-500', text: 'text-gray-700', badge: 'bg-gray-50 border-2 border-gray-200' };

            const card = document.createElement('div');
            card.className = 'modern-card animate-on-scroll';
            card.style.animationDelay = `${index * 0.1}s`;

            card.innerHTML = `
                <!-- Program Image -->
                <div class="h-64 bg-gradient-to-br from-blue-500 to-blue-700 relative overflow-hidden group">
                    ${program.image_url ?
                        `<img src="${program.image_url}" alt="${program.name}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">` :
                        `<div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-8xl opacity-40 group-hover:scale-110 group-hover:opacity-60 transition-all duration-500"></i>
                        </div>`
                    }
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                    <!-- Type Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="px-4 py-2 ${colors.badge} ${colors.text} text-xs font-bold rounded-full uppercase shadow-lg backdrop-blur-sm">
                            ${program.type}
                        </span>
                    </div>

                    <!-- Active Badge -->
                    ${program.is_active ? `
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-2 bg-green-500 text-white text-xs font-bold rounded-full shadow-lg flex items-center space-x-1">
                                <i class="fas fa-check-circle"></i>
                                <span>Active</span>
                            </span>
                        </div>
                    ` : ''}

                    <!-- Program Title Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-2xl font-black text-white mb-2 line-clamp-2">${program.name}</h3>
                    </div>
                </div>

                <div class="p-6">
                    <!-- University & Details -->
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center text-gray-700">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-university text-white text-sm"></i>
                            </div>
                            <span class="font-bold text-base">${program.university ? program.university.name : 'N/A'}</span>
                        </div>

                        ${program.duration ? `
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-clock mr-3 text-green-600 w-5"></i>
                                <span class="font-semibold">${program.duration}</span>
                            </div>
                        ` : ''}

                        ${program.mode ? `
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-laptop mr-3 text-purple-600 w-5"></i>
                                <span class="font-semibold">${program.mode}</span>
                            </div>
                        ` : ''}
                    </div>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-6 line-clamp-2 leading-relaxed">${program.description || 'Comprehensive program designed for career growth and professional development'}</p>

                    <!-- Footer -->
                    <div class="border-t-2 border-gray-100 pt-4 flex justify-between items-center">
                        <div>
                            <p class="text-xs text-gray-500 mb-1 font-semibold">Program Fees</p>
                            <p class="text-3xl font-black gradient-text">
                                ${formatCurrency(program.fees)}
                            </p>
                        </div>
                        <a href="/programs/${program.id}" class="modern-btn bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 shadow-xl">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            `;

            grid.appendChild(card);
        });

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

        renderPrograms(filteredPrograms);
    }

    function updateCount() {
        const count = filteredPrograms.length;
        const total = allPrograms.length;
        const typeText = currentTypeFilter ? ` ${currentTypeFilter.toUpperCase()}` : '';

        document.getElementById('programs-count').innerHTML = `
            <span class="text-blue-600">${count}</span> ${typeText} Program${count !== 1 ? 's' : ''} Found
            ${count !== total ? `<span class="text-gray-500 text-lg ml-2">(of ${total} total)</span>` : ''}
        `;
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

        // Re-observe when new programs are loaded
        const originalRenderPrograms = window.renderPrograms;
        window.renderPrograms = function(programs) {
            originalRenderPrograms(programs);
            setTimeout(() => {
                document.querySelectorAll('.animate-on-scroll').forEach(el => {
                    observer.observe(el);
                });
            }, 100);
        };
    });
</script>
@endpush
