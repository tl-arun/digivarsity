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
        border-color: rgba(99, 102, 241, 0.2);
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
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-400 to-blue-500">
                    With World-Class Education
                </span>
            </h1>

            <!-- Subheading -->
            <p class="text-xl lg:text-2xl text-gray-200 mb-12 max-w-3xl mx-auto animate-on-scroll" style="animation-delay: 0.2s">
                Access premium online programs from top universities. Learn at your pace, advance your career, achieve your dreams.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-16 animate-on-scroll" style="animation-delay: 0.3s">
                <button onclick="openQuizModal()" class="modern-btn bg-white text-blue-700 px-10 py-4 text-lg font-semibold shadow-xl hover:shadow-2xl">
                    <i class="fas fa-magic"></i>
                    <span>Find Your Program</span>
                </button>
                <button onclick="openResumeModal()" class="modern-btn bg-blue-600 hover:bg-blue-700 text-white border-2 border-blue-500 px-10 py-4 text-lg font-semibold">
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
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                Why Choose <span class="gradient-text">Digivarsity</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
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
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Flexible Learning</h3>
                <p class="text-gray-600 leading-relaxed">
                    Study at your own pace with 24/7 access to course materials. Balance work, life, and education seamlessly.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.1s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Industry Recognition</h3>
                <p class="text-gray-600 leading-relaxed">
                    Earn certificates from top universities that are valued by employers worldwide.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.2s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-users-cog text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Expert Mentorship</h3>
                <p class="text-gray-600 leading-relaxed">
                    Learn from industry experts and get personalized guidance throughout your journey.
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.3s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-briefcase text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Career Support</h3>
                <p class="text-gray-600 leading-relaxed">
                    Get 100% placement assistance with resume building, interview prep, and job connections.
                </p>
            </div>

            <!-- Feature 5 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.4s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-project-diagram text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Real Projects</h3>
                <p class="text-gray-600 leading-relaxed">
                    Work on industry-relevant projects and build a portfolio that showcases your skills.
                </p>
            </div>

            <!-- Feature 6 -->
            <div class="modern-card animate-on-scroll" style="animation-delay: 0.5s">
                <div class="feature-icon mb-6">
                    <i class="fas fa-hand-holding-usd text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Affordable EMI</h3>
                <p class="text-gray-600 leading-relaxed">
                    Flexible payment options with easy EMI plans. Invest in your future without financial stress.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Career Journey Section (Intents → Programs → Outcomes) -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-on-scroll">
            <h3 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="gradient-text">Your Career Journey</span>
            </h3>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Choose your goal, find the right program, and achieve your dream career
            </p>
        </div>

        <!-- Journey Flow -->
        <div class="max-w-6xl mx-auto mb-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1: Intent -->
                <div class="text-center animate-on-scroll">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-bullseye text-white text-3xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gray-900">1. Your Goal</h4>
                    <p class="text-gray-600">What do you want to achieve?</p>
                </div>

                <!-- Arrow -->
                <div class="hidden md:flex items-center justify-center">
                    <i class="fas fa-arrow-right text-4xl text-blue-300"></i>
                </div>

                <!-- Step 2: Program -->
                <div class="text-center animate-on-scroll" style="animation-delay: 0.1s">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-3xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gray-900">2. Right Program</h4>
                    <p class="text-gray-600">Learn the skills you need</p>
                </div>

                <!-- Arrow -->
                <div class="hidden md:flex items-center justify-center">
                    <i class="fas fa-arrow-right text-4xl text-blue-300"></i>
                </div>

                <!-- Step 3: Outcome -->
                <div class="text-center animate-on-scroll" style="animation-delay: 0.2s">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-trophy text-white text-3xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold mb-2 text-gray-900">3. Dream Career</h4>
                    <p class="text-gray-600">Achieve your goals</p>
                </div>
            </div>
        </div>

        <!-- Popular Career Paths -->
        <div id="career-paths" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Will be populated by JavaScript -->
        </div>
    </div>
</section>

<!-- Featured Programs Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16 animate-on-scroll">
            <h3 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="gradient-text">Featured Programs</span>
            </h3>
            <p class="text-xl text-gray-600">Explore our most popular programs</p>
        </div>

        <div id="featured-programs" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Programs will be loaded here -->
        </div>

        <div class="text-center mt-12">
            <a href="/programs" class="modern-btn bg-blue-600 hover:bg-blue-700 text-white px-10 py-4 text-lg font-semibold">
                <span>View All Programs</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Partner Universities Section -->
<section class="py-24 bg-white overflow-hidden relative" id="universities">
    <div class="container mx-auto px-6 mb-16 relative z-10">
        <div class="text-center animate-on-scroll">
            <div class="inline-block mb-4">
                <span class="bg-blue-600 text-white px-6 py-3 rounded-full text-sm font-bold">
                    ⭐ WORLD-CLASS PARTNERS
                </span>
            </div>
            <h3 class="text-4xl lg:text-5xl font-black mb-6">
                <span class="gradient-text">Our Partner Universities</span>
            </h3>
            <p class="text-xl text-gray-700 font-semibold mb-4">Collaborating with world's leading institutions</p>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Learn from the <span class="font-bold text-blue-600">best universities</span> across the globe.
                Get internationally recognized degrees that open doors worldwide.
            </p>
        </div>
    </div>

    <!-- Universities Scroll -->
    <div class="relative overflow-hidden py-8">
        <div id="universities-scroll" class="flex space-x-6 animate-scroll">
            <!-- Will be populated by JavaScript -->
        </div>
    </div>
</section>

<!-- Success Stories / Testimonials Section -->
<section id="testimonials" class="py-24 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16 animate-on-scroll">
            <h3 class="text-4xl lg:text-5xl font-black mb-4">
                <span class="gradient-text">Success Stories</span>
            </h3>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Hear from students who transformed their careers with us
            </p>
        </div>

        <!-- Testimonial Carousel -->
        <div class="max-w-4xl mx-auto">
            <div id="testimonial-carousel" class="modern-card text-center p-12 relative">
                <i class="fas fa-quote-left text-blue-200 text-5xl mb-6"></i>
                <p class="text-2xl text-gray-700 mb-8 italic leading-relaxed"></p>
                <div class="flex items-center justify-center space-x-4">
                    <img src="" alt="" class="w-16 h-16 rounded-full object-cover">
                    <div class="text-left">
                        <p class="font-bold text-lg text-gray-900"></p>
                        <p class="text-gray-600"></p>
                    </div>
                </div>
            </div>

            <!-- Carousel Dots -->
            <div class="flex justify-center space-x-3 mt-8">
                <button class="testimonial-dot w-3 h-3 rounded-full bg-blue-600" data-index="0"></button>
                <button class="testimonial-dot w-3 h-3 rounded-full bg-gray-300" data-index="1"></button>
                <button class="testimonial-dot w-3 h-3 rounded-full bg-gray-300" data-index="2"></button>
                <button class="testimonial-dot w-3 h-3 rounded-full bg-gray-300" data-index="3"></button>
            </div>
        </div>
    </div>
</section>

<!-- AI Resume Analyzer CTA Section -->
<section class="py-24 bg-gradient-to-br from-black via-blue-900 to-blue-700 relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute w-96 h-96 bg-white rounded-full top-10 left-10 animate-pulse"></div>
        <div class="absolute w-96 h-96 bg-white rounded-full bottom-10 right-10 animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-white">
                    <div class="inline-block bg-white/20 px-4 py-2 rounded-full text-sm font-bold mb-6">
                        🤖 AI-POWERED MATCHING
                    </div>
                    <h3 class="text-4xl lg:text-5xl font-black mb-6 leading-tight">
                        Upload Your Resume,<br/>
                        <span class="text-yellow-300">Find Your Perfect Program!</span>
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        Our AI analyzes your skills, experience, and qualifications to recommend the best programs tailored just for you.
                    </p>

                    <!-- Features List -->
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start space-x-3">
                            <div class="bg-white/20 rounded-full p-2 mt-1">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Instant Analysis</h4>
                                <p class="opacity-90">Get results in seconds with our advanced AI</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-white/20 rounded-full p-2 mt-1">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Smart Matching</h4>
                                <p class="opacity-90">Programs matched to your skills and goals</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-white/20 rounded-full p-2 mt-1">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">100% Free</h4>
                                <p class="opacity-90">No cost, no commitment required</p>
                            </div>
                        </div>
                    </div>

                    <button onclick="openResumeModal()" class="modern-btn bg-white text-blue-700 px-10 py-5 text-xl font-bold shadow-2xl">
                        <i class="fas fa-file-upload"></i>
                        <span>Upload Resume Now</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <!-- Right Visual -->
                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 border-2 border-white/20">
                        <div class="space-y-4">
                            <!-- Step 1 -->
                            <div class="bg-white rounded-2xl p-6 transform hover:scale-105 transition-all">
                                <div class="flex items-center space-x-4">
                                    <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl">
                                        1
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-bold text-gray-800">Upload Resume</h5>
                                        <p class="text-sm text-gray-600">PDF, DOC, or DOCX format</p>
                                    </div>
                                    <i class="fas fa-upload text-blue-600 text-2xl"></i>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="bg-white rounded-2xl p-6 transform hover:scale-105 transition-all">
                                <div class="flex items-center space-x-4">
                                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl">
                                        2
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-bold text-gray-800">AI Analysis</h5>
                                        <p class="text-sm text-gray-600">Extract skills & keywords</p>
                                    </div>
                                    <i class="fas fa-brain text-blue-600 text-2xl"></i>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="bg-white rounded-2xl p-6 transform hover:scale-105 transition-all">
                                <div class="flex items-center space-x-4">
                                    <div class="bg-gradient-to-br from-blue-700 to-blue-900 text-white w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl">
                                        3
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-bold text-gray-800">Get Matches</h5>
                                        <p class="text-sm text-gray-600">Personalized recommendations</p>
                                    </div>
                                    <i class="fas fa-star text-blue-500 text-2xl"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Trust Badge -->
                        <div class="mt-6 text-center">
                            <div class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white text-sm">
                                <i class="fas fa-shield-alt text-green-300"></i>
                                <span>Your data is 100% secure & confidential</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.footer')

@push('scripts')
<script>
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
        try {
            const response = await apiRequest('/universities', 'GET', null, false);
            // Handle paginated or direct response
            const universities = response.data?.data || response.data || [];

            if (universities.length === 0) {
                // Fallback universities if API fails - using Wikipedia logos
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
            } else {
                displayUniversities(universities);
            }
        } catch (error) {
            console.error('Error loading universities:', error);
            // Show fallback universities with Wikipedia logos
            const fallbackUniversities = [
                { name: 'Oxford University', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Oxford-University-Circlet.svg/200px-Oxford-University-Circlet.svg.png' },
                { name: 'Harvard University', logo: 'https://upload.wikimedia.org/wikipedia/en/thumb/2/29/Harvard_shield_wreath.svg/200px-Harvard_shield_wreath.svg.png' },
                { name: 'Stanford University', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Seal_of_Leland_Stanford_Junior_University.svg/200px-Seal_of_Leland_Stanford_Junior_University.svg.png' },
                { name: 'MIT', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/MIT_logo.svg/200px-MIT_logo.svg.png' }
            ];
            displayUniversities(fallbackUniversities);
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
                <div class="flex-shrink-0 w-64 h-40 bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center justify-center hover:shadow-xl transition-all duration-300 border border-gray-100">
                    ${hasLogo ?
                        `<img src="${logoSrc}" alt="${university.name}" class="h-16 w-auto object-contain mb-3" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">` :
                        ''}
                    <div class="${hasLogo ? 'hidden' : 'flex'} w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full items-center justify-center mb-3">
                        <i class="fas fa-university text-white text-2xl"></i>
                    </div>
                    <p class="text-center font-bold text-gray-800 text-sm">${university.name}</p>
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
            const response = await apiRequest('/programs?is_featured=1&limit=6', 'GET', null, false);
            // Handle paginated response
            const programs = response.data?.data || response.data || [];

            if (programs.length === 0) {
                // Fallback programs
                const fallbackPrograms = [
                    {
                        name: 'MBA',
                        university_name: 'Top University',
                        duration: '2 Years',
                        mode: 'Online',
                        fee: '₹2,50,000',
                        image_url: '/images/programs/mba.jpg'
                    },
                    {
                        name: 'MCA',
                        university_name: 'Leading Institute',
                        duration: '2 Years',
                        mode: 'Online',
                        fee: '₹1,80,000',
                        image_url: '/images/programs/mca.jpg'
                    },
                    {
                        name: 'BBA',
                        university_name: 'Premier University',
                        duration: '3 Years',
                        mode: 'Online',
                        fee: '₹1,50,000',
                        image_url: '/images/programs/bba.jpg'
                    }
                ];
                displayPrograms(fallbackPrograms);
            } else {
                displayPrograms(programs);
            }
        } catch (error) {
            console.error('Error loading programs:', error);
        }
    }

    function displayPrograms(programs) {
        const container = document.getElementById('featured-programs');

        container.innerHTML = programs.map(program => {
            const university = program.university || {};
            const fees = program.fees ? `₹${parseFloat(program.fees).toLocaleString('en-IN')}` : 'Contact Us';

            return `
            <div class="modern-card group cursor-pointer">
                <div class="relative overflow-hidden rounded-xl mb-4 h-48 bg-gradient-to-br from-blue-500 to-blue-700">
                    ${program.image_url ?
                        `<img src="${program.image_url}" alt="${program.name}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" onerror="this.style.display='none'">` :
                        ''}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <h4 class="text-white font-bold text-xl">${program.name}</h4>
                    </div>
                </div>
                <div class="space-y-3">
                    <p class="text-gray-600 font-semibold flex items-center">
                        <i class="fas fa-university text-blue-600 mr-2"></i>
                        ${university.name || program.university_name || 'Top University'}
                    </p>
                    <div class="flex items-center justify-between text-sm text-gray-600">
                        <span class="flex items-center">
                            <i class="fas fa-clock text-blue-600 mr-2"></i>
                            ${program.duration || 'Flexible'}
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-laptop text-blue-600 mr-2"></i>
                            ${program.mode || 'Online'}
                        </span>
                    </div>
                    <div class="flex items-center justify-between pt-3 border-t border-gray-200">
                        <span class="text-2xl font-bold gradient-text">${fees}</span>
                        <a href="/programs/${program.id}" class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm font-semibold hover:bg-blue-700 transition-colors">
                            View Details
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
