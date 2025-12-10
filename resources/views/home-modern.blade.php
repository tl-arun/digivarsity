@extends('layouts.app')

@section('title', 'Home - Digivarsity')

@section('content')

<!-- Career Quiz Modal -->
@include('components.career-quiz-modal')

<!-- Resume Analyzer Modal -->
@include('components.resume-analyzer-modal')

<link rel="stylesheet" href="{{ asset('css/modern-home.css') }}">

<style>
    /* Additional Modern Styles */
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
        background: linear-gradient(90deg, #6366F1, #8B5CF6);
        transition: width 0.3s ease;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }

    /* Hero Background */
    .hero-modern {
        background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4c1d95 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-modern::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.3) 0%, transparent 70%);
        top: -250px;
        right: -250px;
        animation: float 8s ease-in-out infinite;
    }

    .hero-modern::after {
        content: '';
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.2) 0%, transparent 70%);
        bottom: -200px;
        left: -200px;
        animation: float 10s ease-in-out infinite reverse;
    }
</style>

<!-- Modern Navigation -->
<nav class="bg-white/95 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-neutral-200">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 group">
                <div class="w-12 h-12 bg-gradient-to-br from-brand-500 to-brand-700 rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold gradient-text">Digivarsity</h1>
                    <p class="text-xs text-neutral-500 font-medium">Transform Your Future</p>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="/" class="nav-link active text-neutral-900 font-medium hover:text-brand-600 transition-colors">
                    Home
                </a>
                <a href="/programs" class="nav-link text-neutral-600 font-medium hover:text-brand-600 transition-colors">
                    Programs
                </a>
                <a href="#universities" class="nav-link text-neutral-600 font-medium hover:text-brand-600 transition-colors">
                    Universities
                </a>
                <a href="#testimonials" class="nav-link text-neutral-600 font-medium hover:text-brand-600 transition-colors">
                    Success Stories
                </a>
                <a href="#contact" class="nav-link text-neutral-600 font-medium hover:text-brand-600 transition-colors">
                    Contact
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <a href="/programs" class="modern-btn bg-gradient-to-r from-brand-500 to-brand-700 text-white px-8 py-3">
                    <span>Get Started</span>
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button onclick="toggleMobileMenu()" class="lg:hidden text-neutral-700 hover:text-brand-600 transition-colors">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu lg:hidden">
            <div class="py-4 space-y-3">
                <a href="/" class="block px-4 py-3 text-brand-600 font-semibold bg-brand-50 rounded-xl">
                    Home
                </a>
                <a href="/programs" class="block px-4 py-3 text-neutral-700 font-medium hover:bg-neutral-50 rounded-xl transition-colors">
                    Programs
                </a>
                <a href="#universities" onclick="toggleMobileMenu()" class="block px-4 py-3 text-neutral-700 font-medium hover:bg-neutral-50 rounded-xl transition-colors">
                    Universities
                </a>
                <a href="#testimonials" onclick="toggleMobileMenu()" class="block px-4 py-3 text-neutral-700 font-medium hover:bg-neutral-50 rounded-xl transition-colors">
                    Success Stories
                </a>
                <a href="#contact" onclick="toggleMobileMenu()" class="block px-4 py-3 text-neutral-700 font-medium hover:bg-neutral-50 rounded-xl transition-colors">
                    Contact
                </a>
                <a href="/programs" class="block px-6 py-3 bg-gradient-to-r from-brand-500 to-brand-700 text-white rounded-full font-semibold text-center mt-4">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-modern text-white py-24 lg:py-32 relative">
    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-5xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md px-6 py-3 rounded-full mb-8 animate-on-scroll">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-semibold">Trusted by 10,000+ Students</span>
            </div>

            <!-- Heading -->
            <h1 class="text-5xl lg:text-7xl font-black mb-6 leading-tight animate-on-scroll" style="animation-delay: 0.1s">
                Transform Your Career<br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 via-purple-200 to-pink-200">
                    With World-Class Education
                </span>
            </h1>

            <!-- Subheading -->
            <p class="text-xl lg:text-2xl text-neutral-200 mb-12 max-w-3xl mx-auto animate-on-scroll" style="animation-delay: 0.2s">
                Access premium online programs from top universities. Learn at your pace, advance your career, achieve your dreams.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-16 animate-on-scroll" style="animation-delay: 0.3s">
                <button onclick="openQuizModal()" class="modern-btn bg-white text-brand-700 px-10 py-4 text-lg font-semibold shadow-xl hover:shadow-2xl">
                    <i class="fas fa-magic"></i>
                    <span>Find Your Program</span>
                </button>
                <button onclick="openResumeModal()" class="modern-btn bg-white/10 backdrop-blur-md text-white border-2 border-white/30 px-10 py-4 text-lg font-semibold hover:bg-white/20">
                    <i class="fas fa-file-upload"></i>
                    <span>Upload Resume</span>
                </button>
            </div>

            <!-- Trust Indicators -->
            <div class="flex flex-wrap justify-center items-center gap-8 text-sm text-neutral-300 animate-on-scroll" style="animation-delay: 0.4s">
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
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Stat 1 -->
            <div class="text-center animate-on-scroll">
                <div class="feature-icon mx-auto mb-4">
                    <i class="fas fa-graduation-cap text-white text-2xl"></i>
                </div>
                <p class="stat-number gradient-text">
                    <span class="counter" data-target="10">0</span>+
                </p>
                <p class="text-neutral-600 font-semibold mt-2">Programs</p>
                <p class="text-sm text-neutral-500 mt-1">World-class courses</p>
            </div>

            <!-- Stat 2 -->
            <div class="text-center animate-on-scroll" style="animation-delay: 0.1s">
                <div class="feature-icon mx-auto mb-4">
                    <i class="fas fa-university text-white text-2xl"></i>
                </div>
                <p class="stat-number gradient-text">
                    <span class="counter" data-target="8">0</span>+
                </p>
                <p class="text-neutral-600 font-semibold mt-2">Universities</p>
                <p class="text-sm text-neutral-500 mt-1">Top-ranked partners</p>
            </div>

            <!-- Stat 3 -->
            <div class="text-center animate-on-scroll" style="animation-delay: 0.2s">
                <div class="feature-icon mx-auto mb-4">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <p class="stat-number gradient-text">
                    <span class="counter" data-target="10000">0</span>+
                </p>
                <p class="text-neutral-600 font-semibold mt-2">Students</p>
                <p class="text-sm text-neutral-500 mt-1">Lives transformed</p>
            </div>

            <!-- Stat 4 -->
            <div class="text-center animate-on-scroll" style="animation-delay: 0.3s">
                <div class="feature-icon mx-auto mb-4">
                    <i class="fas fa-trophy text-white text-2xl"></i>
                </div>
                <p class="stat-number gradient-text">
                    <span class="counter" data-target="95">0</span>%
                </p>
                <p class="text-neutral-600 font-semibold mt-2">Success Rate</p>
                <p class="text-sm text-neutral-500 mt-1">Career growth</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-24 bg-neutral-50">
    <div class="container mx-auto px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                Why Choose <span class="gradient-text">Digivarsity</span>
            </h2>
            <p class="text-xl text-neutral-600 max-w-2xl mx-auto">
                Experience education that adapts to your lifestyle and accelerates your career growth
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="modern-card animate-on-scroll">
                <div class="feature-icon mb-6">
                    <i class="fas fa-laptop-code text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-neutral-900">Flexible Learning</h3>
                <p class="text-neutral-600 leading-relaxed">
                    Study at your own pace with 24/7 access to course materials. Balance work, life, and education seamlessly.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.1s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-neutral-900">Industry Recognition</h3>
                <p class="text-neutral-600 leading-relaxed">
                    Earn certificates from top universities that are valued by employers worldwide.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.2s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-users-cog text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-neutral-900">Expert Mentorship</h3>
                <p class="text-neutral-600 leading-relaxed">
                    Learn from industry experts and get personalized guidance throughout your journey.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.3s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-briefcase text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-neutral-900">Career Support</h3>
                <p class="text-neutral-600 leading-relaxed">
                    Get 100% placement assistance with resume building, interview prep, and job connections.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.4s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-project-diagram text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-neutral-900">Real Projects</h3>
                <p class="text-neutral-600 leading-relaxed">
                    Work on industry-relevant projects and build a portfolio that showcases your skills.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.5s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-hand-holding-usd text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-neutral-900">Affordable EMI</h3>
                <p class="text-neutral-600 leading-relaxed">
                    Flexible payment options with easy EMI plans. Invest in your future without financial stress.
                </p>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Mobile Menu Toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('active');
    }

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

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
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
</script>
@endpush

@endsection
