@extends('layouts.app')

@section('title', 'Start Your Learning Journey - Digivarsity')

@section('content')

<style>
    .journey-hero {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
        position: relative;
        overflow: hidden;
    }

    .journey-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .journey-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        border-color: #3b82f6;
    }

    .timeline-item {
        position: relative;
        padding-left: 3rem;
        padding-bottom: 2rem;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0.75rem;
        top: 2rem;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, #3b82f6, #93c5fd);
    }

    .timeline-item:last-child::before {
        display: none;
    }

    .timeline-dot {
        position: absolute;
        left: 0;
        top: 0.5rem;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 50%;
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(59, 130, 246, 0.4);
    }

    .benefit-icon {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 1rem;
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }
</style>

@include('components.navbar')

<!-- Hero Section -->
<section class="journey-hero text-white py-20 lg:py-28">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-md px-6 py-3 rounded-full mb-6">
                <i class="fas fa-graduation-cap"></i>
                <span class="font-semibold">Learning Journey</span>
            </div>

            <h1 class="text-5xl lg:text-6xl font-black mb-6 leading-tight">
                Start Your Learning Journey
            </h1>

            <p class="text-xl lg:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto">
                Begin your educational journey with programs designed for fresh starts and new beginnings.
                Transform your passion into expertise.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/programs?intent=learning" class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl transition-all hover:scale-105">
                    <i class="fas fa-search"></i>
                    <span>Explore Programs</span>
                </a>
                <button onclick="openQuizModal()" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full font-bold text-lg border-2 border-blue-400 transition-all">
                    <i class="fas fa-magic"></i>
                    <span>Find My Program</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- What to Expect Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                What to <span class="text-blue-600">Expect</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Your learning journey is carefully designed to take you from beginner to expert
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- Timeline -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-flag"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Foundation Building</h3>
                    <p class="text-gray-600 mb-4">
                        Start with the fundamentals. Our programs begin with core concepts and gradually build your knowledge base.
                        No prior experience needed - we'll guide you every step of the way.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Beginner Friendly</span>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Core Concepts</span>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Structured Learning</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Skill Development</h3>
                    <p class="text-gray-600 mb-4">
                        Master practical skills through hands-on projects and real-world applications. Learn by doing with
                        industry-relevant assignments and case studies.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Hands-on Projects</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Real Applications</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Expert Guidance</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-users"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Community & Mentorship</h3>
                    <p class="text-gray-600 mb-4">
                        Connect with peers, learn from industry experts, and get personalized mentorship. Join a community
                        of learners who support and inspire each other.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">Peer Network</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">Expert Mentors</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">24/7 Support</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-certificate"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Certification & Career Launch</h3>
                    <p class="text-gray-600 mb-4">
                        Earn industry-recognized certifications from top universities. Get career support including resume building,
                        interview preparation, and job placement assistance.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">University Certificate</span>
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Career Support</span>
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Job Placement</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                Why This Journey is <span class="text-blue-600">Perfect for You</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Designed specifically for those starting fresh or exploring new fields
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">No Prerequisites</h3>
                <p class="text-gray-600">
                    Start from scratch with no prior knowledge required. Our programs are designed for absolute beginners.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Flexible Schedule</h3>
                <p class="text-gray-600">
                    Learn at your own pace with 24/7 access to course materials. Study when it suits you best.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Expert Instructors</h3>
                <p class="text-gray-600">
                    Learn from industry professionals and university faculty with years of real-world experience.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Practical Projects</h3>
                <p class="text-gray-600">
                    Build a portfolio of real projects that demonstrate your skills to potential employers.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-award"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Recognized Credentials</h3>
                <p class="text-gray-600">
                    Earn certificates from top universities that are valued by employers worldwide.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Career Services</h3>
                <p class="text-gray-600">
                    Get 100% placement support with resume reviews, interview prep, and job connections.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                Success <span class="text-blue-600">Stories</span>
            </h2>
            <p class="text-xl text-gray-600">
                Hear from learners who started their journey with us
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <div class="journey-card">
                <div class="flex items-start space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name=Priya+Sharma&background=3b82f6&color=fff&size=64" alt="Priya" class="w-16 h-16 rounded-full">
                    <div>
                        <h4 class="font-bold text-lg">Priya Sharma</h4>
                        <p class="text-gray-600 text-sm">Data Science Graduate</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "I had zero coding experience when I started. The structured curriculum and supportive mentors helped me
                    land my dream job as a Data Analyst within 6 months of completing the program!"
                </p>
                <div class="mt-4 flex items-center text-yellow-500">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>

            <div class="journey-card">
                <div class="flex items-start space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name=Rahul+Kumar&background=3b82f6&color=fff&size=64" alt="Rahul" class="w-16 h-16 rounded-full">
                    <div>
                        <h4 class="font-bold text-lg">Rahul Kumar</h4>
                        <p class="text-gray-600 text-sm">MBA Graduate</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "Coming from a non-business background, I was nervous about pursuing an MBA. The program's foundation
                    courses gave me the confidence I needed. Now I'm a Product Manager at a leading tech company!"
                </p>
                <div class="mt-4 flex items-center text-yellow-500">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-blue-600 to-indigo-700 text-white">
    <div class="container mx-auto px-6 lg:px-8 text-center">
        <h2 class="text-4xl lg:text-5xl font-black mb-6">
            Ready to Start Your Journey?
        </h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
            Join thousands of learners who have transformed their careers with Digivarsity
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/programs?intent=learning" class="inline-flex items-center justify-center gap-2 bg-white text-blue-700 px-10 py-5 rounded-full font-bold text-lg hover:shadow-2xl transition-all hover:scale-105">
                <i class="fas fa-search"></i>
                <span>Browse Programs</span>
            </a>
            <button onclick="openQuizModal()" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white px-10 py-5 rounded-full font-bold text-lg hover:bg-white hover:text-blue-700 transition-all">
                <i class="fas fa-magic"></i>
                <span>Take Career Quiz</span>
            </button>
        </div>
    </div>
</section>

@include('components.footer')

@endsection
