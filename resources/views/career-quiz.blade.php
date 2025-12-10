@extends('layouts.app')

@section('title', 'Career Quiz - Digivarsity')

@section('content')
<!-- Navigation -->
@include('components.navbar')

<style>
    .quiz-option {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .quiz-option:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .quiz-option.selected {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: #667eea;
    }

    .progress-bar {
        transition: width 0.5s ease;
    }
</style>

<section class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 py-16">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-semibold text-gray-700">Question <span id="current-question">1</span> of 5</span>
                    <span class="text-sm font-semibold text-indigo-600"><span id="progress-percent">20</span>% Complete</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div id="progress-bar" class="progress-bar bg-gradient-to-r from-indigo-600 to-purple-600 h-3 rounded-full" style="width: 20%"></div>
                </div>
            </div>

            <!-- Quiz Card -->
            <div class="bg-white rounded-3xl shadow-2xl p-12">
                <div id="quiz-container">
                    <!-- Question 1 -->
                    <div class="quiz-question active" data-question="1">
                        <h2 class="text-4xl font-black text-gray-900 mb-4">What's your current career stage?</h2>
                        <p class="text-gray-600 mb-8">This helps us recommend the right programs for you</p>

                        <div class="space-y-4">
                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 hover:border-indigo-600" data-value="fresh-graduate">
                                <div class="flex items-center">
                                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-user-graduate text-indigo-600 text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">Fresh Graduate</h3>
                                        <p class="text-gray-600">Just completed my studies, looking to start my career</p>
                                    </div>
                                </div>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 hover:border-indigo-600" data-value="working-professional">
                                <div class="flex items-center">
                                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-briefcase text-purple-600 text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">Working Professional</h3>
                                        <p class="text-gray-600">Currently employed, want to upskill or advance</p>
                                    </div>
                                </div>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 hover:border-indigo-600" data-value="career-switcher">
                                <div class="flex items-center">
                                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-exchange-alt text-green-600 text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">Career Switcher</h3>
                                        <p class="text-gray-600">Looking to transition to a completely new field</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div class="quiz-question hidden" data-question="2">
                        <h2 class="text-4xl font-black text-gray-900 mb-4">What's your primary goal?</h2>
                        <p class="text-gray-600 mb-8">Select what matters most to you</p>

                        <div class="space-y-4">
                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6" data-value="degree">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Get a Recognized Degree</h3>
                                <p class="text-gray-600">Build credibility with UGC-approved credentials</p>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6" data-value="earn-learn">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Earn While Learning</h3>
                                <p class="text-gray-600">Work-integrated programs with income opportunities</p>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6" data-value="upskill">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Upskill for Career Growth</h3>
                                <p class="text-gray-600">Advance in current role or transition to leadership</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 3 -->
                    <div class="quiz-question hidden" data-question="3">
                        <h2 class="text-4xl font-black text-gray-900 mb-4">What's your preferred learning mode?</h2>
                        <p class="text-gray-600 mb-8">How do you learn best?</p>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 text-center" data-value="online">
                                <i class="fas fa-laptop text-4xl text-indigo-600 mb-3"></i>
                                <h3 class="text-xl font-bold text-gray-900">100% Online</h3>
                                <p class="text-gray-600 text-sm mt-2">Study from anywhere, anytime</p>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 text-center" data-value="hybrid">
                                <i class="fas fa-chalkboard-teacher text-4xl text-purple-600 mb-3"></i>
                                <h3 class="text-xl font-bold text-gray-900">Hybrid</h3>
                                <p class="text-gray-600 text-sm mt-2">Mix of online and in-person</p>
                            </div>
                        </div>
                    </div>

                    <!-- Question 4 -->
                    <div class="quiz-question hidden" data-question="4">
                        <h2 class="text-4xl font-black text-gray-900 mb-4">What's your budget range?</h2>
                        <p class="text-gray-600 mb-8">We offer flexible payment options</p>

                        <div class="space-y-4">
                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6" data-value="budget-low">
                                <h3 class="text-xl font-bold text-gray-900">Under ₹50,000</h3>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6" data-value="budget-mid">
                                <h3 class="text-xl font-bold text-gray-900">₹50,000 - ₹1,50,000</h3>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6" data-value="budget-high">
                                <h3 class="text-xl font-bold text-gray-900">Above ₹1,50,000</h3>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6" data-value="budget-flexible">
                                <h3 class="text-xl font-bold text-gray-900">Flexible (EMI Options)</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Question 5 -->
                    <div class="quiz-question hidden" data-question="5">
                        <h2 class="text-4xl font-black text-gray-900 mb-4">When do you want to start?</h2>
                        <p class="text-gray-600 mb-8">Choose your preferred timeline</p>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 text-center" data-value="immediate">
                                <i class="fas fa-bolt text-4xl text-yellow-500 mb-3"></i>
                                <h3 class="text-xl font-bold text-gray-900">Immediately</h3>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 text-center" data-value="1-3-months">
                                <i class="fas fa-calendar-alt text-4xl text-blue-500 mb-3"></i>
                                <h3 class="text-xl font-bold text-gray-900">1-3 Months</h3>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 text-center" data-value="3-6-months">
                                <i class="fas fa-calendar-check text-4xl text-green-500 mb-3"></i>
                                <h3 class="text-xl font-bold text-gray-900">3-6 Months</h3>
                            </div>

                            <div class="quiz-option border-2 border-gray-300 rounded-xl p-6 text-center" data-value="exploring">
                                <i class="fas fa-search text-4xl text-purple-500 mb-3"></i>
                                <h3 class="text-xl font-bold text-gray-900">Just Exploring</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Results -->
                    <div id="quiz-results" class="hidden text-center">
                        <div class="mb-8">
                            <i class="fas fa-check-circle text-green-500 text-7xl mb-4"></i>
                            <h2 class="text-4xl font-black text-gray-900 mb-4">Perfect! We Found Your Match</h2>
                            <p class="text-xl text-gray-600">Based on your answers, here are the best programs for you</p>
                        </div>

                        <div id="recommended-programs" class="space-y-4 mb-8">
                            <!-- Will be populated by JavaScript -->
                        </div>

                        <a href="/programs" class="inline-block px-12 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full font-bold text-lg hover:shadow-xl transform hover:scale-105 transition-all">
                            View All Recommended Programs
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div id="quiz-navigation" class="flex justify-between mt-12">
                    <button id="prev-btn" class="px-8 py-3 border-2 border-gray-300 text-gray-700 rounded-full font-bold hover:bg-gray-50 transition hidden">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Previous
                    </button>
                    <button id="next-btn" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full font-bold hover:shadow-xl transform hover:scale-105 transition-all ml-auto disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        Next
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
let currentQuestion = 1;
const totalQuestions = 5;
let answers = {};

document.addEventListener('DOMContentLoaded', function() {
    // Option selection
    document.querySelectorAll('.quiz-option').forEach(option => {
        option.addEventListener('click', function() {
            const question = this.closest('.quiz-question');
            const questionNum = question.dataset.question;

            // Remove selected from siblings
            question.querySelectorAll('.quiz-option').forEach(opt => {
                opt.classList.remove('selected');
            });

            // Add selected to clicked option
            this.classList.add('selected');

            // Store answer
            answers[questionNum] = this.dataset.value;

            // Enable next button
            document.getElementById('next-btn').disabled = false;
        });
    });

    // Next button
    document.getElementById('next-btn').addEventListener('click', function() {
        if (currentQuestion < totalQuestions) {
            currentQuestion++;
            showQuestion(currentQuestion);
            updateProgress();
            this.disabled = true;
        } else {
            showResults();
        }
    });

    // Previous button
    document.getElementById('prev-btn').addEventListener('click', function() {
        if (currentQuestion > 1) {
            currentQuestion--;
            showQuestion(currentQuestion);
            updateProgress();
        }
    });
});

function showQuestion(num) {
    document.querySelectorAll('.quiz-question').forEach(q => {
        q.classList.add('hidden');
        q.classList.remove('active');
    });

    const question = document.querySelector(`[data-question="${num}"]`);
    question.classList.remove('hidden');
    question.classList.add('active');

    // Update buttons
    document.getElementById('prev-btn').classList.toggle('hidden', num === 1);
    document.getElementById('next-btn').textContent = num === totalQuestions ? 'See Results' : 'Next';

    // Check if question already answered
    if (answers[num]) {
        document.getElementById('next-btn').disabled = false;
        const selectedOption = question.querySelector(`[data-value="${answers[num]}"]`);
        if (selectedOption) {
            selectedOption.classList.add('selected');
        }
    }
}

function updateProgress() {
    const percent = (currentQuestion / totalQuestions) * 100;
    document.getElementById('progress-bar').style.width = percent + '%';
    document.getElementById('progress-percent').textContent = Math.round(percent);
    document.getElementById('current-question').textContent = currentQuestion;
}

function showResults() {
    document.getElementById('quiz-container').querySelector('.active').classList.add('hidden');
    document.getElementById('quiz-navigation').classList.add('hidden');
    document.getElementById('quiz-results').classList.remove('hidden');

    // Simulate recommendations based on answers
    const recommendations = getRecommendations(answers);
    displayRecommendations(recommendations);
}

function getRecommendations(answers) {
    // Simple recommendation logic
    const recommendations = [];

    if (answers['2'] === 'degree') {
        recommendations.push({
            name: 'Bachelor of Business Administration (BBA)',
            university: 'Top University',
            match: '95%'
        });
    } else if (answers['2'] === 'earn-learn') {
        recommendations.push({
            name: 'Work-Integrated MBA Program',
            university: 'Leading Business School',
            match: '92%'
        });
    } else if (answers['2'] === 'upskill') {
        recommendations.push({
            name: 'Executive Certificate in Digital Marketing',
            university: 'Premier Institute',
            match: '90%'
        });
    }

    return recommendations;
}

function displayRecommendations(recommendations) {
    const container = document.getElementById('recommended-programs');
    container.innerHTML = recommendations.map(rec => `
        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6 text-left">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">${rec.name}</h3>
                    <p class="text-gray-600">${rec.university}</p>
                </div>
                <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full font-bold">${rec.match} Match</span>
            </div>
        </div>
    `).join('');
}
</script>

<!-- Footer -->
@include('components.footer')
@endsection
