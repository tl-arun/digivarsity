@extends('layouts.app')

@section('title', 'Build Your Career While Studying - Digivarsity')

@section('content')

<style>
    .journey-hero {
        background: linear-gradient(135deg, #059669 0%, #10b981 50%, #34d399 100%);
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
        border-color: #10b981;
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
        background: linear-gradient(to bottom, #10b981, #6ee7b7);
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
        background: linear-gradient(135deg, #10b981, #059669);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(16, 185, 129, 0.4);
    }

    .benefit-icon {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 1rem;
        background: linear-gradient(135deg, #10b981, #059669);
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
                <i class="fas fa-briefcase"></i>
                <span class="font-semibold">Career Building Journey</span>
            </div>

            <h1 class="text-5xl lg:text-6xl font-black mb-6 leading-tight">
                Build Your Career While Studying
            </h1>

            <p class="text-xl lg:text-2xl text-green-100 mb-8 max-w-3xl mx-auto">
                Balance work and education with flexible programs that fit your schedule.
                Advance your career without putting your life on hold.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/programs?intent=career" class="inline-flex items-center justify-center gap-2 bg-white text-green-700 px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl transition-all hover:scale-105">
                    <i class="fas fa-search"></i>
                    <span>Explore Programs</span>
                </a>
                <button onclick="openQuizModal()" class="inline-flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-full font-bold text-lg border-2 border-green-400 transition-all">
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
                Your <span class="text-green-600">Dual-Track</span> Journey
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Designed for working professionals who want to grow without career breaks
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- Timeline -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Flexible Schedule</h3>
                    <p class="text-gray-600 mb-4">
                        Study on weekends, evenings, or whenever you have time. Our programs are designed to fit around your work schedule
                        with recorded lectures, flexible deadlines, and self-paced learning modules.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Weekend Classes</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Evening Sessions</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Self-Paced</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Apply While You Learn</h3>
                    <p class="text-gray-600 mb-4">
                        Immediately apply new skills at your current job. Work on real projects that benefit both your learning
                        and your employer, creating a win-win situation for career growth.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Real Projects</span>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Immediate Impact</span>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Career Growth</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-network-wired"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Professional Networking</h3>
                    <p class="text-gray-600 mb-4">
                        Connect with fellow working professionals, industry leaders, and alumni. Build a network that opens doors
                        to new opportunities and collaborations in your field.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">Peer Network</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">Industry Leaders</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">Alumni Access</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-rocket"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Career Acceleration</h3>
                    <p class="text-gray-600 mb-4">
                        Earn promotions, switch roles, or transition to new industries. Our programs are designed to fast-track
                        your career with recognized credentials and in-demand skills.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Promotions</span>
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Role Transitions</span>
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Salary Growth</span>
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
                Why This Journey is <span class="text-green-600">Perfect for You</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Designed for ambitious professionals who refuse to choose between work and education
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Work-Life-Study Balance</h3>
                <p class="text-gray-600">
                    Maintain your job, personal life, and education simultaneously with our flexible learning model.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">No Income Loss</h3>
                <p class="text-gray-600">
                    Continue earning while you learn. No need to quit your job or take unpaid leave.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Immediate ROI</h3>
                <p class="text-gray-600">
                    Apply new skills at work immediately and see tangible results in your current role.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Industry-Relevant</h3>
                <p class="text-gray-600">
                    Learn from working professionals who understand the challenges you face daily.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Employer Recognition</h3>
                <p class="text-gray-600">
                    Earn credentials that employers value and often sponsor for their employees.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Career Support</h3>
                <p class="text-gray-600">
                    Get guidance on promotions, role changes, and career transitions from experts.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-20 bg-gradient-to-br from-green-50 to-emerald-50">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                Success <span class="text-green-600">Stories</span>
            </h2>
            <p class="text-xl text-gray-600">
                Professionals who advanced their careers while working
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <div class="journey-card">
                <div class="flex items-start space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name=Amit+Patel&background=10b981&color=fff&size=64" alt="Amit" class="w-16 h-16 rounded-full">
                    <div>
                        <h4 class="font-bold text-lg">Amit Patel</h4>
                        <p class="text-gray-600 text-sm">Senior Software Engineer → Tech Lead</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "I completed my MBA while working full-time. The weekend classes and flexible schedule made it possible.
                    Within 3 months of graduation, I was promoted to Tech Lead with a 40% salary increase!"
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
                    <img src="https://ui-avatars.com/api/?name=Sneha+Reddy&background=10b981&color=fff&size=64" alt="Sneha" class="w-16 h-16 rounded-full">
                    <div>
                        <h4 class="font-bold text-lg">Sneha Reddy</h4>
                        <p class="text-gray-600 text-sm">Marketing Manager → Digital Marketing Head</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "The Digital Marketing program transformed my career. I applied everything I learned directly to my campaigns.
                    My employer was so impressed, they promoted me and sponsored the rest of my education!"
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
<section class="py-20 bg-gradient-to-br from-green-600 to-emerald-700 text-white">
    <div class="container mx-auto px-6 lg:px-8 text-center">
        <h2 class="text-4xl lg:text-5xl font-black mb-6">
            Ready to Accelerate Your Career?
        </h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
            Don't wait for the perfect time. Start building your future today while keeping your career on track.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/programs?intent=career" class="inline-flex items-center justify-center gap-2 bg-white text-green-700 px-10 py-5 rounded-full font-bold text-lg hover:shadow-2xl transition-all hover:scale-105">
                <i class="fas fa-search"></i>
                <span>Browse Programs</span>
            </a>
            <button onclick="openQuizModal()" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white px-10 py-5 rounded-full font-bold text-lg hover:bg-white hover:text-green-700 transition-all">
                <i class="fas fa-magic"></i>
                <span>Take Career Quiz</span>
            </button>
        </div>
    </div>
</section>

@include('components.footer')

@endsection
