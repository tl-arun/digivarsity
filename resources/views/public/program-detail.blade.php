@extends('layouts.app')

@section('title', $program->name . ' - Digivarsity')

@section('content')
<style>
    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .gradient-animated {
        background: linear-gradient(270deg, #000000, #0D47A1, #1976D2, #2196F3);
        background-size: 800% 800%;
        animation: gradient-shift 8s ease infinite;
    }

    .hero-card {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
    }
</style>

<!-- Navigation -->
@include('components.navbar')

<!-- Hero Section with Intent & Outcome -->
<section class="gradient-animated text-white py-20 relative overflow-hidden">
    <!-- Floating Shapes -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full animate-pulse" style="animation-delay: 1s"></div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 relative z-10">
        <!-- Breadcrumb -->
        <div class="mb-6">
            <a href="{{ route('public.programs') }}" class="text-white/80 hover:text-white transition">
                <i class="fas fa-arrow-left mr-2"></i>Back to Programs
            </a>
        </div>

        <!-- Program Title -->
        <div class="text-center mb-12">
            <div class="inline-block mb-4">
                <span class="bg-white/20 backdrop-blur-sm px-6 py-2 rounded-full text-sm font-bold uppercase">
                    {{ $program->type }}
                </span>
            </div>
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-black mb-4">
                {{ $program->name }}
            </h1>
            <p class="text-xl sm:text-2xl mb-2 opacity-90">
                {{ $program->university->name ?? 'N/A' }}
            </p>
            @if($program->duration)
            <p class="text-lg opacity-80">
                <i class="fas fa-clock mr-2"></i>{{ $program->duration }}
            </p>
            @endif
        </div>

        <!-- Intent & Outcome Cards -->
        @if($program->intent || $program->outcome)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            <!-- Intent Card -->
            @if($program->intent)
            <div class="hero-card rounded-2xl p-8 shadow-2xl transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-bullseye text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Your Intent</h3>
                </div>
                <h4 class="text-xl font-bold text-blue-600 mb-2">{{ $program->intent->name }}</h4>
                @if($program->intent->description)
                <p class="text-gray-700">{{ $program->intent->description }}</p>
                @endif
            </div>
            @endif

            <!-- Outcome Card -->
            @if($program->outcome)
            <div class="hero-card rounded-2xl p-8 shadow-2xl transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-trophy text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Your Outcome</h3>
                </div>
                <h4 class="text-xl font-bold text-green-600 mb-2">{{ $program->outcome->name }}</h4>
                @if($program->outcome->description)
                <p class="text-gray-700">{{ $program->outcome->description }}</p>
                @endif
            </div>
            @endif
        </div>
        @endif
    </div>
</section>

<!-- Program Details -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Program Image -->
                    @if($program->image_url)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <img src="{{ $program->image_url }}" alt="{{ $program->name }}" class="w-full h-96 object-cover">
                    </div>
                    @endif

                    <!-- Description -->
                    @if($program->description)
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-blue-600 mr-3"></i>
                            About This Program
                        </h2>
                        <p class="text-gray-700 text-lg leading-relaxed">{{ $program->description }}</p>
                    </div>
                    @endif

                    <!-- Curriculum -->
                    @if($program->curriculum)
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-book text-blue-600 mr-3"></i>
                            Curriculum
                        </h2>
                        <div class="text-gray-700 text-lg leading-relaxed">
                            {!! nl2br(e($program->curriculum)) !!}
                        </div>
                    </div>
                    @endif

                    <!-- Eligibility -->
                    @if($program->eligibility)
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            Eligibility Criteria
                        </h2>
                        <div class="text-gray-700 text-lg leading-relaxed">
                            {!! nl2br(e($program->eligibility)) !!}
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg p-8 sticky top-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Program Details</h3>

                        <div class="space-y-4">
                            <!-- Fees -->
                            @if($program->fees)
                            <div class="border-b border-gray-200 pb-4">
                                <p class="text-sm text-gray-500 mb-1">Program Fees</p>
                                <p class="text-3xl font-black text-blue-600">
                                    ₹{{ number_format($program->fees, 2) }}
                                </p>
                            </div>
                            @endif

                            <!-- Duration -->
                            @if($program->duration)
                            <div class="border-b border-gray-200 pb-4">
                                <p class="text-sm text-gray-500 mb-1">Duration</p>
                                <p class="text-lg font-bold text-gray-900">{{ $program->duration }}</p>
                            </div>
                            @endif

                            <!-- Mode -->
                            @if($program->mode)
                            <div class="border-b border-gray-200 pb-4">
                                <p class="text-sm text-gray-500 mb-1">Mode</p>
                                <p class="text-lg font-bold text-gray-900">{{ $program->mode }}</p>
                            </div>
                            @endif

                            <!-- Type -->
                            <div class="border-b border-gray-200 pb-4">
                                <p class="text-sm text-gray-500 mb-1">Program Type</p>
                                <p class="text-lg font-bold text-gray-900 uppercase">{{ $program->type }}</p>
                            </div>

                            <!-- University -->
                            @if($program->university)
                            <div class="pb-4">
                                <p class="text-sm text-gray-500 mb-1">University</p>
                                <p class="text-lg font-bold text-gray-900">{{ $program->university->name }}</p>
                            </div>
                            @endif
                        </div>

                        <!-- CTA Button -->
                        <button onclick="openEnrollModal()" class="w-full mt-6 px-6 py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-bold hover:shadow-xl transform hover:scale-105 transition-all">
                            <i class="fas fa-paper-plane mr-2"></i>Enroll Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
@if($program->testimonials && $program->testimonials->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">
                <i class="fas fa-quote-left text-blue-600 mr-3"></i>
                Student Success Stories
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($program->testimonials as $testimonial)
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 shadow-lg">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full flex items-center justify-center text-white text-2xl font-bold mr-4">
                            {{ substr($testimonial->student_name, 0, 1) }}
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">{{ $testimonial->student_name }}</h4>
                            <p class="text-sm text-gray-600">{{ $testimonial->before_role }} → {{ $testimonial->after_role }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"{{ $testimonial->testimonial_text }}"</p>
                    @if($testimonial->company_name)
                    <p class="text-sm text-blue-600 font-semibold mt-4">
                        <i class="fas fa-building mr-2"></i>{{ $testimonial->company_name }}
                    </p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- Enrollment Modal -->
<div id="enrollModal" class="modal">
    <div class="bg-white rounded-lg p-8 max-w-md w-full">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">Enroll in {{ $program->name }}</h3>
            <button onclick="closeEnrollModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-2xl"></i>
            </button>
        </div>

        <form id="enrollForm" onsubmit="handleEnrollSubmit(event)">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                    <input type="text" id="enroll_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                    <input type="email" id="enroll_email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone *</label>
                    <input type="tel" id="enroll_phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Message (Optional)</label>
                    <textarea id="enroll_message" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeEnrollModal()" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Submit Enrollment
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
@include('components.footer')
@endsection

@push('scripts')
<script>
    function openEnrollModal() {
        document.getElementById('enrollModal').classList.add('active');
    }

    function closeEnrollModal() {
        document.getElementById('enrollModal').classList.remove('active');
        document.getElementById('enrollForm').reset();
    }

    async function handleEnrollSubmit(event) {
        event.preventDefault();

        const data = {
            name: document.getElementById('enroll_name').value,
            email: document.getElementById('enroll_email').value,
            phone: document.getElementById('enroll_phone').value,
            program_id: {{ $program->id }},
            @if($program->intent_id)
            intent_id: {{ $program->intent_id }},
            @endif
            @if($program->outcome_id)
            outcome_id: {{ $program->outcome_id }},
            @endif
            message: document.getElementById('enroll_message').value
        };

        try {
            showLoading();
            const response = await apiRequest('/leads', 'POST', data, false);

            if (response.success) {
                showToast('Enrollment request submitted successfully! We will contact you soon.', 'success');
                closeEnrollModal();
            }
        } catch (error) {
            showToast(error.message || 'Failed to submit enrollment request', 'error');
        } finally {
            hideLoading();
        }
    }
</script>
@endpush
