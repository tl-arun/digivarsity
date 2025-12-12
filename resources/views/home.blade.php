@extends('layouts.app')

@section('title', 'Home - Digivarsity')

@section('content')

<!-- Career Quiz Modal -->
@include('components.career-quiz-modal')

<!-- Resume Analyzer Modal -->
@include('components.resume-analyzer-modal')

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
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border-color: rgba(33, 150, 243, 0.3);
    }

    /* Program Card Specific Styles */
    .program-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        min-height: 500px;
    }

    .program-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.06);
        border-color: rgba(33, 150, 243, 0.3);
    }

    /* Line clamp utilities */
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Responsive grid improvements */
    @media (max-width: 640px) {
        .program-card {
            min-height: 450px;
            border-radius: 0.75rem;
        }
        
        #featured-programs {
            gap: 1rem !important;
        }
    }

    @media (min-width: 641px) and (max-width: 1024px) {
        .program-card {
            min-height: 480px;
        }
        
        #featured-programs {
            gap: 1.5rem !important;
        }
    }

    @media (min-width: 1025px) {
        .program-card {
            min-height: 520px;
        }
        
        #featured-programs {
            gap: 2rem !important;
        }
    }

    /* Enhanced button styling */
    .program-card a[href*="/programs/"] {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        box-shadow: 0 4px 14px 0 rgba(37, 99, 235, 0.3);
        border: none;
        font-weight: 600;
        letter-spacing: 0.025em;
    }

    .program-card a[href*="/programs/"]:hover {
        background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
        box-shadow: 0 8px 25px 0 rgba(37, 99, 235, 0.4);
        transform: translateY(-2px) scale(1.02);
    }

    /* Ensure equal height cards */
    #featured-programs {
        align-items: stretch;
    }

    .program-card {
        display: flex;
        flex-direction: column;
        height: 100%;
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

    /* Navigation Link */
    .nav-link {
        position: relative;
        padding-bottom: 0.25rem;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #2196F3;
        transition: width 0.3s ease;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }

    /* Feature Icon */
    .feature-icon {
        width: 4rem;
        height: 4rem;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
        box-shadow: 0 10px 20px -5px rgba(33, 150, 243, 0.4);
        transition: all 0.3s ease;
    }

    .feature-icon:hover {
        transform: rotate(5deg) scale(1.1);
    }

    /* Mobile Menu */
    .mobile-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .mobile-menu.active {
        max-height: 500px;
    }

    /* Stats Number */
    .stat-number {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1;
        letter-spacing: -0.02em;
    }

    @media (max-width: 768px) {
        .stat-number {
            font-size: 2.5rem;
        }
    }
</style>

<!-- Navigation -->
@include('components.navbar')

<!-- Intent Selector Section -->
@include('components.intent-selector')

<!-- Hero Section -->
<section class="hero-modern text-white py-12 sm:py-16 md:py-20 lg:py-32 relative">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-5xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md px-4 sm:px-6 py-2 sm:py-3 rounded-full mb-6 sm:mb-8 animate-on-scroll">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-xs sm:text-sm font-semibold">Trusted by 10,000+ Students</span>
            </div>

            <!-- Heading -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-black mb-4 sm:mb-6 leading-tight animate-on-scroll" style="animation-delay: 0.1s">
                Transform Your Career<br class="hidden sm:block"/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-400 to-blue-500">
                    With World-Class Education
                </span>
            </h1>

            <!-- Subheading -->
            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-200 mb-8 sm:mb-12 max-w-3xl mx-auto animate-on-scroll px-4" style="animation-delay: 0.2s">
                Access premium online programs from top universities. Learn at your pace, advance your career, achieve your dreams.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-3 sm:gap-4 mb-12 sm:mb-16 animate-on-scroll px-4" style="animation-delay: 0.3s">
                <button onclick="openQuizModal()" class="w-full sm:w-auto modern-btn bg-white text-blue-700 px-6 sm:px-10 py-3 sm:py-4 text-base sm:text-lg font-semibold shadow-xl hover:shadow-2xl">
                    <i class="fas fa-magic"></i>
                    <span>Find Your Program</span>
                </button>
                <button onclick="openResumeModal()" class="w-full sm:w-auto modern-btn bg-blue-600 hover:bg-blue-700 text-white border-2 border-blue-500 px-6 sm:px-10 py-3 sm:py-4 text-base sm:text-lg font-semibold">
                    <i class="fas fa-file-upload"></i>
                    <span>Upload Resume</span>
                </button>
            </div>

            <!-- Trust Indicators -->
            <div class="flex flex-wrap justify-center items-center gap-8 text-sm text-gray-300 animate-on-scroll" style="animation-delay: 0.4s">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-check-circle text-green-400"></i>
                    <span>100% Placement Support</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-check-circle text-green-400"></i>
                    <span>Industry Recognized</span>
                </div>
                <div class="flex items-center space-x-2">
                    <i class="fas fa-check-circle text-green-400"></i>
                    <span>Flexible Learning</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-white/50 text-2xl"></i>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 sm:py-16 md:py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 md:gap-8">
            <!-- Stat 1 -->
            <div class="text-center animate-on-scroll">
                <div class="feature-icon mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <p class="stat-number gradient-text">
                    <span class="counter" data-target="10">0</span>+
                </p>
                <p class="text-gray-600 font-semibold mt-2">Programs</p>
                <p class="text-sm text-gray-500 mt-1">World-class courses</p>
            </div>

            <!-- Stat 2 -->
            <div class="text-center animate-on-scroll" style="animation-delay: 0.1s">
                <div class="feature-icon mx-auto mb-4">
                    <i class="fas fa-university text-white text-2xl"></i>
                </div>
                <p class="stat-number gradient-text">
                    <span class="counter" data-target="8">0</span>+
                </p>
                <p class="text-gray-600 font-semibold mt-2">Universities</p>
                <p class="text-sm text-gray-500 mt-1">Top-ranked partners</p>
            </div>

            <!-- Stat 3 -->
            <div class="text-center animate-on-scroll" style="animation-delay: 0.2s">
                <div class="feature-icon mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <p class="stat-number gradient-text">
                    <span class="counter" data-target="10000">0</span>+
                </p>
                <p class="text-gray-600 font-semibold mt-2">Students</p>
                <p class="text-sm text-gray-500 mt-1">Lives transformed</p>
            </div>

            <!-- Stat 4 -->
            <div class="text-center animate-on-scroll" style="animation-delay: 0.3s">
                <div class="feature-icon mx-auto mb-4">
                    <i class="fas fa-trophy text-white text-2xl"></i>
                </div>
                <p class="stat-number gradient-text">
                    <span class="counter" data-target="95">0</span>%
                </p>
                <p class="text-gray-600 font-semibold mt-2">Success Rate</p>
                <p class="text-sm text-gray-500 mt-1">Career growth</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->

<!-- Career Journey Section (Intents → Programs → Outcomes) -->


<!-- Featured Programs Section -->
<section class="py-12 sm:py-16 md:py-20 lg:py-24 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 sm:mb-16 animate-on-scroll">
            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black mb-4">
                <span class="gradient-text">Featured Programs</span>
            </h3>
            <p class="text-lg sm:text-xl text-gray-600 px-4">Explore our most popular programs</p>
        </div>

        <div id="featured-programs" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 items-stretch">
            <!-- Programs will be loaded here -->
        </div>

        <div class="text-center mt-8 sm:mt-12">
            <a href="/programs" class="modern-btn bg-blue-600 hover:bg-blue-700 text-white px-8 sm:px-10 py-3 sm:py-4 text-base sm:text-lg font-semibold">
                <span>View All Programs</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Partner Universities Section -->
<section class="py-12 sm:py-16 md:py-20 lg:py-24 bg-white overflow-hidden relative" id="universities">
    <!-- Header Section - Centered -->
    <div class="w-full px-4 sm:px-6 mb-12 sm:mb-16 relative z-10">
        <div class="text-center animate-on-scroll max-w-6xl mx-auto">
            <div class="inline-block mb-4">
                <span class="bg-blue-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-bold">
                    ⭐ WORLD-CLASS PARTNERS
                </span>
            </div>
            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-black mb-4 sm:mb-6">
                <span class="gradient-text">Our Partner Universities</span>
            </h3>
            <p class="text-lg sm:text-xl text-gray-700 font-semibold mb-3 sm:mb-4">Collaborating with world's leading institutions</p>
            <p class="text-base sm:text-lg text-gray-600 max-w-4xl mx-auto">
                Learn from the <span class="font-bold text-blue-600">best universities</span> across the globe.
                Get internationally recognized degrees that open doors worldwide.
            </p>
        </div>
    </div>

    <!-- Universities Scroll - Full Width -->
    <div class="w-full overflow-hidden py-6 sm:py-8">
        <div id="universities-scroll" class="flex space-x-4 sm:space-x-6 md:space-x-8 animate-scroll pl-4 sm:pl-6">
            <!-- Will be populated by JavaScript -->
        </div>
    </div>
</section>

<!-- Success Stories / Testimonials Section -->

<!-- AI Resume Analyzer CTA Section -->

<!-- Footer -->
@include('components.footer')

@push('scripts')
<script>
    // Enhanced Scroll Animation Observer with Staggered Effects
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');

                // Add staggered animation for grid children
                const gridChildren = entry.target.querySelectorAll('.grid > *');
                gridChildren.forEach((child, index) => {
                    setTimeout(() => {
                        child.classList.add('visible');
                    }, index * 150);
                });
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll, .animate-fade-left, .animate-fade-right, .animate-scale-in').forEach(el => {
        observer.observe(el);
    });

    // Counter Animation
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString();
            }
        }, 16);
    }

    // Trigger counters when visible
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                animateCounter(counter);
                counterObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter').forEach(counter => {
        counterObserver.observe(counter);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Load Universities Carousel
    async function loadUniversitiesCarousel() {
        console.log('Loading universities carousel...');

        // Always show fallback universities with logos for now to ensure they display
        const fallbackUniversities = [
            { name: 'Oxford University', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Oxford-University-Circlet.svg/200px-Oxford-University-Circlet.svg.png' },
            { name: 'Harvard University', logo: 'https://upload.wikimedia.org/wikipedia/en/thumb/2/29/Harvard_shield_wreath.svg/200px-Harvard_shield_wreath.svg.png' },
            { name: 'Stanford University', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Seal_of_Leland_Stanford_Junior_University.svg/200px-Seal_of_Leland_Stanford_Junior_University.svg.png' },
            { name: 'MIT', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/MIT_logo.svg/200px-MIT_logo.svg.png' },
            { name: 'Cambridge University', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Coat_of_Arms_of_the_University_of_Cambridge.svg/200px-Coat_of_Arms_of_the_University_of_Cambridge.svg.png' },
            { name: 'IIT Delhi', logo: 'https://upload.wikimedia.org/wikipedia/en/thumb/f/fd/Indian_Institute_of_Technology_Delhi_Logo.svg/200px-Indian_Institute_of_Technology_Delhi_Logo.svg.png' },
            { name: 'IIM Ahmedabad', logo: 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f5/Indian_Institute_of_Management_Ahmedabad_Logo.svg/200px-Indian_Institute_of_Management_Ahmedabad_Logo.svg.png' },
            { name: 'University of Delhi', logo: 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4b/University_of_Delhi.svg/200px-University_of_Delhi.svg.png' }
        ];

        displayUniversities(fallbackUniversities);

        // Try to load from API in background
        try {
            const response = await apiRequest('/universities', 'GET', null, false);
            const universities = response.data?.data || response.data || [];

            if (universities.length > 0) {
                console.log('Loaded universities from API:', universities.length);
                displayUniversities(universities);
            }
        } catch (error) {
            console.log('Using fallback universities due to API error:', error);
        }
    }

    function displayUniversities(universities) {
        // Duplicate for infinite scroll effect
        const duplicated = [...universities, ...universities, ...universities];
        const container = document.getElementById('universities-scroll');

        container.innerHTML = duplicated.map(university => {
            // Check for logo in different possible fields
            const logoUrl = university.logo || university.logo_url || university.image_url;
            const hasLogo = logoUrl && logoUrl.trim() !== '';

            // Determine the full logo path
            let logoSrc = '';
            if (hasLogo) {
                // If it's a full URL (starts with http), use it directly
                if (logoUrl.startsWith('http')) {
                    logoSrc = logoUrl;
                } else if (logoUrl.startsWith('/')) {
                    // If it starts with /, use it as is
                    logoSrc = logoUrl;
                } else {
                    // Otherwise, assume it's in storage
                    logoSrc = `/storage/${logoUrl}`;
                }
            }

            return `
                <div class="flex-shrink-0 w-48 sm:w-52 md:w-56 lg:w-64 h-32 sm:h-36 md:h-40 bg-white rounded-xl sm:rounded-2xl shadow-lg p-3 sm:p-4 md:p-6 flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <img src="${logoSrc}" alt="${university.name}" class="h-8 sm:h-10 md:h-12 lg:h-16 w-auto object-contain mb-2 sm:mb-3"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                         onload="this.nextElementSibling.style.display='none';">
                    <div class="w-8 sm:w-10 md:w-12 lg:w-16 h-8 sm:h-10 md:h-12 lg:h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full items-center justify-center mb-2 sm:mb-3" style="display: none;">
                        <i class="fas fa-university text-white text-sm sm:text-lg md:text-xl lg:text-2xl"></i>
                    </div>
                    <p class="text-center font-bold text-gray-800 text-xs sm:text-sm md:text-sm leading-tight px-1">${university.name}</p>
                </div>
            `;
        }).join('');
    }

    // Testimonials Data
    let testimonials = [];
    let currentTestimonialIndex = 0;

    // Load Testimonials from API
    async function loadTestimonials() {
        try {
            const response = await apiRequest('/testimonials', 'GET', null, false);
            // Handle paginated or direct response
            testimonials = response.data?.data || response.data || [];

            if (testimonials.length === 0) {
                // Fallback testimonials
                testimonials = [
                    {
                        student_name: "Rajesh Kumar",
                        after_role: "MBA Graduate",
                        image: null,
                        message: "Digivarsity transformed my career! The flexible learning schedule allowed me to balance work and studies perfectly. Now I'm working at a Fortune 500 company."
                    },
                    {
                        student_name: "Priya Sharma",
                        after_role: "Data Science Professional",
                        image: null,
                        message: "The quality of education and mentorship I received was exceptional. The placement support helped me land my dream job with a 150% salary hike!"
                    },
                    {
                        student_name: "Amit Patel",
                        after_role: "Digital Marketing Manager",
                        image: null,
                        message: "Best decision of my life! The industry-relevant curriculum and hands-on projects gave me the confidence to switch careers successfully."
                    }
                ];
            }

            if (testimonials.length > 0) {
                displayTestimonial(0);
            }
        } catch (error) {
            console.error('Error loading testimonials:', error);
        }
    }

    function rotateTestimonial() {
        currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
        displayTestimonial(currentTestimonialIndex);
    }

    function displayTestimonial(index) {
        if (testimonials.length === 0) return;

        const testimonial = testimonials[index];
        const carousel = document.getElementById('testimonial-carousel');

        carousel.querySelector('p').textContent = testimonial.message || testimonial.text;

        const imgElement = carousel.querySelector('img');
        if (testimonial.image) {
            imgElement.src = '/storage/' + testimonial.image;
            imgElement.style.display = 'block';
        } else {
            imgElement.style.display = 'none';
        }

        imgElement.alt = testimonial.student_name || testimonial.name;
        carousel.querySelector('.font-bold').textContent = testimonial.student_name || testimonial.name;
        carousel.querySelector('.text-gray-600').textContent = testimonial.after_role || testimonial.role;

        // Update dots
        document.querySelectorAll('.testimonial-dot').forEach((dot, i) => {
            if (i === index) {
                dot.classList.remove('bg-gray-300');
                dot.classList.add('bg-indigo-600');
            } else {
                dot.classList.remove('bg-indigo-600');
                dot.classList.add('bg-gray-300');
            }
        });
    }

    // Testimonial dot click handlers
    document.querySelectorAll('.testimonial-dot').forEach(dot => {
        dot.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            currentTestimonialIndex = index;
            displayTestimonial(index);
        });
    });

    // Load Featured Programs
    async function loadFeaturedPrograms() {
        try {
            console.log('Loading featured programs...');
            const response = await apiRequest('/programs?is_featured=1&limit=6', 'GET', null, false);
            console.log('API Response:', response);

            // Handle paginated response
            const programs = response.data?.data || response.data || [];
            console.log('Programs found:', programs.length);

            if (programs.length === 0) {
                console.log('No featured programs found, using fallback programs');
                // Fallback programs with proper IDs
                const fallbackPrograms = [
                    {
                        id: 1,
                        name: 'MBA in Digital Marketing',
                        university_name: 'Top University',
                        duration: '2 Years',
                        mode: 'Online',
                        fees: '250000',
                        image_url: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&h=600&fit=crop&q=80'
                    },
                    {
                        id: 2,
                        name: 'Master of Computer Applications',
                        university_name: 'Leading Institute',
                        duration: '2 Years',
                        mode: 'Online',
                        fees: '180000',
                        image_url: 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?w=800&h=600&fit=crop&q=80'
                    },
                    {
                        id: 3,
                        name: 'Bachelor of Business Administration',
                        university_name: 'Premier University',
                        duration: '3 Years',
                        mode: 'Online',
                        fees: '150000',
                        image_url: 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=800&h=600&fit=crop&q=80'
                    }
                ];
                displayPrograms(fallbackPrograms);
            } else {
                console.log('Displaying API programs');
                displayPrograms(programs);
            }
        } catch (error) {
            console.error('Error loading programs:', error);
            // Show fallback programs on error
            const fallbackPrograms = [
                {
                    id: 1,
                    name: 'MBA in Digital Marketing',
                    university_name: 'Top University',
                    duration: '2 Years',
                    mode: 'Online',
                    fees: '250000',
                    image_url: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&h=600&fit=crop&q=80'
                }
            ];
            displayPrograms(fallbackPrograms);
        }
    }

    function displayPrograms(programs) {
        const container = document.getElementById('featured-programs');

        if (!programs || programs.length === 0) {
            container.innerHTML = `
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-600">No programs available at the moment.</p>
                </div>
            `;
            return;
        }

        container.innerHTML = programs.map(program => {
            // Debug: Log program data to console
            console.log('Program data:', program);

            const university = program.university || {};
            const fees = program.fees ? `₹${parseFloat(program.fees).toLocaleString('en-IN')}` : 'Contact Us';
            const programId = program.id || 1; // Fallback to 1 if no ID
            const imageUrl = program.image_url || 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&h=600&fit=crop&q=80';

            return `
            <div class="program-card group cursor-pointer overflow-hidden h-full flex flex-col">
                <!-- Program Image -->
                <div class="h-48 sm:h-52 md:h-56 lg:h-60 bg-gradient-to-br from-blue-500 to-blue-700 relative overflow-hidden flex-shrink-0">
                    <img src="${imageUrl}" alt="${program.name || 'Program'}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                         onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';"
                         loading="lazy">
                    <div class="w-full h-full flex items-center justify-center" style="display: none;">
                        <i class="fas fa-graduation-cap text-white text-6xl sm:text-7xl md:text-8xl opacity-40 group-hover:scale-110 group-hover:opacity-60 transition-all duration-500"></i>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                    <!-- Active Badge -->
                    <div class="absolute top-3 left-3 sm:top-4 sm:left-4">
                        <span class="px-2 py-1 sm:px-3 sm:py-2 bg-green-500 text-white text-xs font-bold rounded-full shadow-lg flex items-center space-x-1">
                            <i class="fas fa-check-circle text-xs"></i>
                            <span class="hidden sm:inline">Active</span>
                        </span>
                    </div>

                    <!-- Program Title Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 sm:p-5 md:p-6">
                        <h3 class="text-lg sm:text-xl md:text-2xl font-black text-white mb-1 sm:mb-2 line-clamp-2 leading-tight">${program.name || 'Program'}</h3>
                    </div>
                </div>

                <!-- Card Content -->
                <div class="p-4 sm:p-5 md:p-6 flex-1 flex flex-col">
                    <!-- University & Details -->
                    <div class="space-y-2 sm:space-y-3 mb-3 sm:mb-4 flex-shrink-0">
                        <div class="flex items-center text-gray-700">
                            <div class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                <i class="fas fa-university text-white text-xs sm:text-sm"></i>
                            </div>
                            <span class="font-bold text-sm sm:text-base line-clamp-1">${university.name || program.university_name || 'Top University'}</span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-clock mr-2 text-green-600 w-4 text-xs sm:text-sm flex-shrink-0"></i>
                                <span class="font-semibold text-xs sm:text-sm line-clamp-1">${program.duration || 'Flexible'}</span>
                            </div>

                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-laptop mr-2 text-purple-600 w-4 text-xs sm:text-sm flex-shrink-0"></i>
                                <span class="font-semibold text-xs sm:text-sm line-clamp-1">${program.mode || 'Online'}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="flex-1 mb-4 sm:mb-5 md:mb-6">
                        <p class="text-gray-600 text-xs sm:text-sm line-clamp-3 leading-relaxed">${program.description || 'Comprehensive program designed for career growth and professional development'}</p>
                    </div>

                    <!-- Footer -->
                    <div class="border-t-2 border-gray-100 pt-3 sm:pt-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4">
                        <div class="flex-shrink-0">
                            <p class="text-xs text-gray-500 mb-1 font-semibold">Program Fees</p>
                            <p class="text-xl sm:text-2xl md:text-3xl font-black gradient-text line-clamp-1">
                                ${fees}
                            </p>
                        </div>
                        <a href="/programs/${programId}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 rounded-xl sm:rounded-2xl font-semibold text-sm sm:text-base transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:scale-105 flex-shrink-0">
                            <span>View Details</span>
                            <i class="fas fa-arrow-right text-xs sm:text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        `;
        }).join('');
    }

    // Load Career Paths (Intents with Programs and Outcomes)
    async function loadCareerPaths() {
        try {
            const response = await apiRequest('/intents', 'GET', null, false);
            const intents = response.data?.data || response.data || [];

            if (intents.length === 0) return;

            // Take first 6 intents
            const topIntents = intents.slice(0, 6);
            displayCareerPaths(topIntents);
        } catch (error) {
            console.error('Error loading career paths:', error);
        }
    }

    function displayCareerPaths(intents) {
        const container = document.getElementById('career-paths');

        container.innerHTML = intents.map(intent => `
            <div class="modern-card group cursor-pointer" onclick="exploreIntent(${intent.id})">
                <div class="flex items-start space-x-4 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bullseye text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">${intent.name}</h4>
                        <p class="text-gray-600 text-sm line-clamp-2">${intent.description || 'Explore programs for this career path'}</p>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-200">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">
                            <i class="fas fa-graduation-cap text-indigo-600 mr-1"></i>
                            View Programs
                        </span>
                        <i class="fas fa-arrow-right text-indigo-600 group-hover:translate-x-2 transition-transform"></i>
                    </div>
                </div>
            </div>
        `).join('');
    }

    function exploreIntent(intentId) {
        window.location.href = `/programs?intent=${intentId}`;
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        loadCareerPaths();
        loadFeaturedPrograms();
        loadUniversitiesCarousel();
        loadTestimonials();

        // Auto-rotate testimonials every 5 seconds
        setInterval(rotateTestimonial, 5000);
    });
</script>

<style>
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll {
        animation: scroll 40s linear infinite;
    }

    .animate-scroll:hover {
        animation-play-state: paused;
    }
</style>

@endpush

<!-- AI Chatbot Modal -->
@include('components.chatbot-modal')

<!-- Chatbot Button -->
@include('components.chatbot-button')

@endsection
