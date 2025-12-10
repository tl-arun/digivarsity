@extends('layouts.app')

@section('title', 'Level Up Your Professional Skills - Digivarsity')

@section('content')

<style>
    .journey-hero {
        background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 50%, #c4b5fd 100%);
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
        border-color: #a78bfa;
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
        background: linear-gradient(to bottom, #a78bfa, #ddd6fe);
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
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(167, 139, 250, 0.4);
    }

    .benefit-icon {
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 1rem;
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
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
                <i class="fas fa-chart-line"></i>
                <span class="font-semibold">Professional Development</span>
            </div>

            <h1 class="text-5xl lg:text-6xl font-black mb-6 leading-tight">
                Level Up Your Professional Skills
            </h1>

            <p class="text-xl lg:text-2xl text-purple-100 mb-8 max-w-3xl mx-auto">
                Advance your career with specialized programs for working professionals.
                Master cutting-edge skills and become a leader in your field.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/programs?intent=professional" class="inline-flex items-center justify-center gap-2 bg-white text-purple-700 px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl transition-all hover:scale-105">
                    <i class="fas fa-search"></i>
                    <span>Explore Programs</span>
                </a>
                <button onclick="openQuizModal()" class="inline-flex items-center justify-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-full font-bold text-lg border-2 border-purple-400 transition-all">
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
                Your <span class="text-purple-600">Leadership</span> Journey
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Designed for experienced professionals ready to take the next big step
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- Timeline -->
            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Advanced Skill Mastery</h3>
                    <p class="text-gray-600 mb-4">
                        Go beyond basics with advanced courses in emerging technologies, leadership, and strategic thinking.
                        Learn from industry pioneers and stay ahead of the curve.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">Advanced Topics</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">Cutting-Edge Tech</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">Strategic Thinking</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-users-cog"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Leadership Development</h3>
                    <p class="text-gray-600 mb-4">
                        Build essential leadership skills including team management, strategic planning, and executive communication.
                        Prepare for C-suite and senior leadership roles.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Team Leadership</span>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Strategic Planning</span>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Executive Skills</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Global Perspective</h3>
                    <p class="text-gray-600 mb-4">
                        Gain international exposure through global case studies, cross-cultural projects, and networking with
                        professionals worldwide. Think globally, act strategically.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Global Cases</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">International Network</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Cross-Cultural</span>
                    </div>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="journey-card">
                    <h3 class="text-2xl font-bold mb-3 text-gray-900">Executive Positioning</h3>
                    <p class="text-gray-600 mb-4">
                        Position yourself for senior roles with executive credentials, thought leadership opportunities, and
                        access to exclusive career advancement resources.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Executive Roles</span>
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Thought Leadership</span>
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Career Acceleration</span>
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
                Why This Journey is <span class="text-purple-600">Perfect for You</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Designed for ambitious professionals ready to lead and innovate
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Executive Credentials</h3>
                <p class="text-gray-600">
                    Earn prestigious certifications that position you for C-suite and senior leadership roles.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Fast-Track Career</h3>
                <p class="text-gray-600">
                    Accelerate your path to leadership with skills that set you apart from the competition.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Innovation Focus</h3>
                <p class="text-gray-600">
                    Learn to drive innovation and transformation in your organization with cutting-edge strategies.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Elite Network</h3>
                <p class="text-gray-600">
                    Connect with senior executives, industry leaders, and successful alumni worldwide.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Salary Growth</h3>
                <p class="text-gray-600">
                    Our graduates report average salary increases of 50-80% within 2 years of completion.
                </p>
            </div>

            <div class="journey-card text-center">
                <div class="benefit-icon mx-auto mb-4">
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Industry Recognition</h3>
                <p class="text-gray-600">
                    Become a recognized expert in your field with credentials from world-class universities.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-20 bg-gradient-to-br from-purple-50 to-indigo-50">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-black mb-4">
                Success <span class="text-purple-600">Stories</span>
            </h2>
            <p class="text-xl text-gray-600">
                Professionals who reached new heights in their careers
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <div class="journey-card">
                <div class="flex items-start space-x-4 mb-4">
                    <img src="https://ui-avatars.com/api/?name=Vikram+Singh&background=a78bfa&color=fff&size=64" alt="Vikram" class="w-16 h-16 rounded-full">
                    <div>
                        <h4 class="font-bold text-lg">Vikram Singh</h4>
                        <p class="text-gray-600 text-sm">Engineering Manager → VP of Engineering</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "The Executive MBA program gave me the business acumen I needed to move from technical management to executive leadership.
                    I'm now VP of Engineering at a Fortune 500 company with a 70% salary increase!"
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
                    <img src="https://ui-avatars.com/api/?name=Meera+Nair&background=a78bfa&color=fff&size=64" alt="Meera" class="w-16 h-16 rounded-full">
                    <div>
                        <h4 class="font-bold text-lg">Meera Nair</h4>
                        <p class="text-gray-600 text-sm">Senior Consultant → Chief Strategy Officer</p>
                    </div>
                </div>
                <p class="text-gray-700 italic">
                    "The Strategic Leadership program transformed how I think about business. The global perspective and executive
                    network opened doors I never imagined. I'm now CSO at a leading consulting firm!"
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
<section class="py-20 bg-gradient-to-br from-purple-600 to-indigo-700 text-white">
    <div class="container mx-auto px-6 lg:px-8 text-center">
        <h2 class="text-4xl lg:text-5xl font-black mb-6">
            Ready to Lead the Future?
        </h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
            Join the ranks of successful executives who transformed their careers with advanced professional education.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="/programs?intent=professional" class="inline-flex items-center justify-center gap-2 bg-white text-purple-700 px-10 py-5 rounded-full font-bold text-lg hover:shadow-2xl transition-all hover:scale-105">
                <i class="fas fa-search"></i>
                <span>Browse Programs</span>
            </a>
            <button onclick="openQuizModal()" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-white text-white px-10 py-5 rounded-full font-bold text-lg hover:bg-white hover:text-purple-700 transition-all">
                <i class="fas fa-magic"></i>
                <span>Take Career Quiz</span>
            </button>
        </div>
    </div>
</section>

@include('components.footer')

@endsection
