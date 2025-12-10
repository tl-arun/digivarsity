<!-- Career Quiz Modal -->
<div id="careerQuizModal" class="fixed inset-0 bg-black bg-opacity-50 z-[9999] flex items-center justify-center p-4 sm:p-6 lg:p-8" style="display: none;">
    <div class="modal-content bg-white rounded-2xl sm:rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] sm:max-h-[85vh] overflow-y-auto relative mx-auto my-auto">
        <!-- Close Button -->
        <button onclick="closeQuizModal()" class="sticky top-2 right-2 float-right text-gray-400 hover:text-gray-600 text-lg z-10 bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-sm">
            <i class="fas fa-times"></i>
        </button>

        <div class="p-4 sm:p-6 md:p-8 clear-both">
            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-medium text-gray-600">Question <span id="quiz-current">1</span> of <span id="quiz-total">4</span></span>
                    <span class="text-xs font-medium text-blue-600"><span id="quiz-progress">0</span>% Complete</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div id="quiz-progress-bar" class="bg-gradient-to-r from-blue-500 to-cyan-500 h-2 rounded-full transition-all duration-500" style="width: 0%"></div>
                </div>
            </div>

            <!-- Quiz Container -->
            <div id="quiz-questions">
                <!-- Question 1: Career Stage -->
                <div class="quiz-step active" data-step="1">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-800 mb-2 sm:mb-3">What's your current career stage?</h2>
                    <p class="text-sm text-gray-600 mb-5 sm:mb-6">This helps us recommend the right programs for you</p>

                    <div class="space-y-3 sm:space-y-4">
                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 hover:border-blue-400 cursor-pointer transition-all hover:shadow-md" data-answer="fresh-graduate">
                            <div class="flex items-center">
                                <div class="bg-blue-50 w-10 h-10 sm:w-12 sm:h-12 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                    <i class="fas fa-user-graduate text-blue-600 text-lg"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-sm sm:text-base font-medium text-gray-800">Fresh Graduate</h3>
                                    <p class="text-xs sm:text-sm text-gray-600">Just completed my studies, looking to start my career</p>
                                </div>
                            </div>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 hover:border-cyan-400 cursor-pointer transition-all hover:shadow-md" data-answer="working-professional">
                            <div class="flex items-center">
                                <div class="bg-cyan-50 w-10 h-10 sm:w-12 sm:h-12 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                    <i class="fas fa-briefcase text-cyan-600 text-lg"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-sm sm:text-base font-medium text-gray-800">Working Professional</h3>
                                    <p class="text-xs sm:text-sm text-gray-600">Currently employed, want to upskill or advance</p>
                                </div>
                            </div>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 hover:border-green-400 cursor-pointer transition-all hover:shadow-md" data-answer="career-switcher">
                            <div class="flex items-center">
                                <div class="bg-green-50 w-10 h-10 sm:w-12 sm:h-12 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                    <i class="fas fa-exchange-alt text-green-600 text-lg"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h3 class="text-sm sm:text-base font-medium text-gray-800">Career Switcher</h3>
                                    <p class="text-xs sm:text-sm text-gray-600">Looking to transition to a completely new field</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Question 2: Primary Goal -->
                <div class="quiz-step hidden" data-step="2">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-800 mb-2 sm:mb-3">What's your primary goal?</h2>
                    <p class="text-sm text-gray-600 mb-5 sm:mb-6">Select what matters most to you</p>

                    <div class="space-y-3">
                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 hover:border-blue-400 cursor-pointer transition-all" data-answer="degree">
                            <h3 class="text-sm sm:text-base font-medium text-gray-800 mb-1">Get a Recognized Degree</h3>
                            <p class="text-xs sm:text-sm text-gray-600">Build credibility with UGC-approved credentials</p>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 hover:border-blue-400 cursor-pointer transition-all" data-answer="earn-learn">
                            <h3 class="text-sm sm:text-base font-medium text-gray-800 mb-1">Earn While Learning</h3>
                            <p class="text-xs sm:text-sm text-gray-600">Work-integrated programs with income opportunities</p>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 hover:border-blue-400 cursor-pointer transition-all" data-answer="upskill">
                            <h3 class="text-sm sm:text-base font-medium text-gray-800 mb-1">Upskill for Career Growth</h3>
                            <p class="text-xs sm:text-sm text-gray-600">Advance in current role or transition to leadership</p>
                        </div>
                    </div>
                </div>

                <!-- Question 3: Learning Mode -->
                <div class="quiz-step hidden" data-step="3">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-800 mb-2 sm:mb-3">What's your preferred learning mode?</h2>
                    <p class="text-sm text-gray-600 mb-5 sm:mb-6">How do you learn best?</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 text-center hover:border-blue-400 cursor-pointer transition-all hover:shadow-md" data-answer="online">
                            <i class="fas fa-laptop text-2xl text-blue-500 mb-2"></i>
                            <h3 class="text-sm font-medium text-gray-800">100% Online</h3>
                            <p class="text-xs text-gray-600 mt-1">Study from anywhere, anytime</p>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 text-center hover:border-green-400 cursor-pointer transition-all hover:shadow-md" data-answer="odl">
                            <i class="fas fa-book-open text-2xl text-green-600 mb-2"></i>
                            <h3 class="text-sm font-medium text-gray-800">ODL</h3>
                            <p class="text-xs text-gray-600 mt-1">Open Distance Learning</p>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 text-center hover:border-cyan-400 cursor-pointer transition-all hover:shadow-md" data-answer="work-linked">
                            <i class="fas fa-briefcase text-2xl text-cyan-500 mb-2"></i>
                            <h3 class="text-sm font-medium text-gray-800">Work-Linked</h3>
                            <p class="text-xs text-gray-600 mt-1">Earn while you learn</p>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 text-center hover:border-orange-400 cursor-pointer transition-all hover:shadow-md" data-answer="executive">
                            <i class="fas fa-user-tie text-2xl text-orange-600 mb-2"></i>
                            <h3 class="text-sm font-medium text-gray-800">Executive</h3>
                            <p class="text-xs text-gray-600 mt-1">For senior professionals</p>
                        </div>
                    </div>
                </div>

                <!-- Question 4: Timeline -->
                <div class="quiz-step hidden" data-step="4">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-800 mb-2 sm:mb-3">When do you want to start?</h2>
                    <p class="text-sm text-gray-600 mb-5 sm:mb-6">Choose your preferred timeline</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 text-center hover:border-yellow-400 cursor-pointer transition-all hover:shadow-md" data-answer="immediate">
                            <i class="fas fa-bolt text-2xl text-yellow-500 mb-2"></i>
                            <h3 class="text-sm font-medium text-gray-800">Immediately</h3>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 text-center hover:border-blue-400 cursor-pointer transition-all hover:shadow-md" data-answer="1-3-months">
                            <i class="fas fa-calendar-alt text-2xl text-blue-500 mb-2"></i>
                            <h3 class="text-sm font-medium text-gray-800">1-3 Months</h3>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 text-center hover:border-green-400 cursor-pointer transition-all hover:shadow-md" data-answer="3-6-months">
                            <i class="fas fa-calendar-check text-2xl text-green-500 mb-2"></i>
                            <h3 class="text-sm font-medium text-gray-800">3-6 Months</h3>
                        </div>

                        <div class="quiz-choice border border-gray-200 rounded-lg p-4 text-center hover:border-cyan-400 cursor-pointer transition-all hover:shadow-md" data-answer="exploring">
                            <i class="fas fa-search text-2xl text-cyan-500 mb-2"></i>
                            <h3 class="text-sm font-medium text-gray-800">Just Exploring</h3>
                        </div>
                    </div>
                </div>

                <!-- Results -->
                <div id="quiz-results-section" class="hidden">
                    <div class="text-center mb-6">
                        <i class="fas fa-check-circle text-green-500 text-4xl mb-3"></i>
                        <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-800 mb-2">Perfect! We Found Your Match 🎉</h2>
                        <p class="text-sm text-gray-600">Based on your answers, here are the best programs for you</p>
                    </div>

                    <div id="quiz-recommended-programs" class="space-y-4 mb-8">
                        <!-- Will be populated by JavaScript -->
                    </div>

                    <div class="text-center">
                        <a href="/programs" class="inline-block px-8 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-full font-medium text-sm hover:shadow-lg transform hover:scale-105 transition-all">
                            View All Programs
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div id="quiz-nav-buttons" class="flex justify-between mt-8">
                <button id="quiz-prev-btn" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-full font-medium text-sm hover:bg-gray-50 transition hidden">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Previous
                </button>
                <button id="quiz-next-btn" class="px-6 py-2.5 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-full font-medium text-sm hover:shadow-lg transform hover:scale-105 transition-all ml-auto disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    Next
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modal Positioning and Responsiveness */
    #careerQuizModal {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    #careerQuizModal > div {
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #careerQuizModal[style*="flex"] > div {
        transform: scale(1);
        opacity: 1;
    }

    /* Responsive Modal Sizing */
    @media (max-width: 640px) {
        #careerQuizModal {
            padding: 1rem !important;
        }
        
        #careerQuizModal > div {
            max-height: 95vh !important;
            margin: auto;
        }
    }

    @media (max-width: 480px) {
        #careerQuizModal {
            padding: 0.5rem !important;
        }
        
        #careerQuizModal > div {
            max-height: 98vh !important;
            border-radius: 1rem !important;
        }
    }

    .quiz-choice {
        transition: all 0.2s ease;
    }

    .quiz-choice:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .quiz-choice.selected {
        background: linear-gradient(135deg, #3B82F6 0%, #06B6D4 100%);
        color: white;
        border-color: #3B82F6;
    }

    .quiz-choice.selected h3,
    .quiz-choice.selected p {
        color: white;
    }

    .quiz-choice.selected .bg-blue-50,
    .quiz-choice.selected .bg-cyan-50,
    .quiz-choice.selected .bg-green-50 {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .quiz-choice.selected i {
        color: white;
    }

    /* Ensure modal content is scrollable on small screens */
    @media (max-height: 600px) {
        #careerQuizModal > div {
            max-height: 95vh !important;
        }
    }

    /* Custom Scrollbar Styling */
    #careerQuizModal > div::-webkit-scrollbar {
        width: 6px;
    }

    #careerQuizModal > div::-webkit-scrollbar-track {
        background: transparent;
    }

    #careerQuizModal > div::-webkit-scrollbar-thumb {
        background: rgba(156, 163, 175, 0.5);
        border-radius: 3px;
    }

    #careerQuizModal > div::-webkit-scrollbar-thumb:hover {
        background: rgba(156, 163, 175, 0.8);
    }

    /* Hide scrollbar for Firefox */
    #careerQuizModal > div {
        scrollbar-width: thin;
        scrollbar-color: rgba(156, 163, 175, 0.5) transparent;
    }

    /* Prevent body scroll when modal is open */
    body.modal-open {
        overflow: hidden !important;
        padding-right: 0px !important;
    }
</style>

<script>
let quizCurrentStep = 1;
const quizTotalSteps = 4;
let quizAnswers = {};
let allPrograms = [];

// Open quiz modal
function openQuizModal() {
    const modal = document.getElementById('careerQuizModal');
    modal.classList.remove('hidden');
    modal.style.display = 'flex';
    
    // Prevent body scroll with proper scrollbar handling
    if (typeof preventBodyScroll === 'function') {
        preventBodyScroll();
    } else {
        document.body.style.overflow = 'hidden';
    }
    
    // Ensure proper centering
    setTimeout(() => {
        modal.scrollTop = 0;
        const modalContent = modal.querySelector('div');
        if (modalContent) {
            modalContent.scrollTop = 0;
        }
    }, 100);
    
    loadProgramsForQuiz();
}

// Close quiz modal
function closeQuizModal() {
    const modal = document.getElementById('careerQuizModal');
    modal.classList.add('hidden');
    modal.style.display = 'none';
    
    // Restore body scroll with proper scrollbar handling
    if (typeof restoreBodyScroll === 'function') {
        restoreBodyScroll();
    } else {
        document.body.style.overflow = 'auto';
    }
    
    resetQuiz();
}

// Reset quiz
function resetQuiz() {
    quizCurrentStep = 1;
    quizAnswers = {};
    document.querySelectorAll('.quiz-step').forEach(step => {
        step.classList.add('hidden');
    });
    document.querySelector('[data-step="1"]').classList.remove('hidden');
    document.querySelectorAll('.quiz-choice').forEach(choice => {
        choice.classList.remove('selected');
    });
    document.getElementById('quiz-results-section').classList.add('hidden');
    document.getElementById('quiz-nav-buttons').classList.remove('hidden');
    document.getElementById('quiz-next-btn').disabled = true;
    updateQuizProgress();
}

// Load programs for quiz
async function loadProgramsForQuiz() {
    if (allPrograms.length > 0) return;

    try {
        const response = await apiRequest('/programs?per_page=100', 'GET', null, false);
        if (response.success) {
            allPrograms = response.data.data || [];
        }
    } catch (error) {
        console.error('Failed to load programs:', error);
    }
}

// Update progress
function updateQuizProgress() {
    // Progress based on completed steps: Step 1 = 0%, Step 2 = 25%, Step 3 = 50%, Step 4 = 75%
    const percent = ((quizCurrentStep - 1) / quizTotalSteps) * 100;
    document.getElementById('quiz-progress-bar').style.width = percent + '%';
    document.getElementById('quiz-progress').textContent = Math.round(percent);
    document.getElementById('quiz-current').textContent = quizCurrentStep;
}

// Show quiz step
function showQuizStep(step) {
    document.querySelectorAll('.quiz-step').forEach(s => {
        s.classList.add('hidden');
    });

    const stepElement = document.querySelector(`[data-step="${step}"]`);
    if (stepElement) {
        stepElement.classList.remove('hidden');
    }

    // Update buttons
    document.getElementById('quiz-prev-btn').classList.toggle('hidden', step === 1);
    const nextBtn = document.getElementById('quiz-next-btn');
    nextBtn.innerHTML = step === quizTotalSteps ?
        'See Results <i class="fas fa-arrow-right ml-2"></i>' :
        'Next <i class="fas fa-arrow-right ml-2"></i>';

    // Check if already answered
    if (quizAnswers[step]) {
        nextBtn.disabled = false;
        const selected = stepElement.querySelector(`[data-answer="${quizAnswers[step]}"]`);
        if (selected) {
            selected.classList.add('selected');
        }
    } else {
        nextBtn.disabled = true;
    }
}

// Filter programs based on quiz answers
function filterProgramsByQuiz() {
    let filtered = [...allPrograms];

    // Filter by learning mode (step 3)
    if (quizAnswers[3]) {
        filtered = filtered.filter(p => p.type === quizAnswers[3]);
    }

    // Filter by goal (step 2)
    if (quizAnswers[2] === 'earn-learn') {
        filtered = filtered.filter(p => p.type === 'work-linked');
    }

    return filtered;
}

// Show quiz results
function showQuizResults() {
    document.getElementById('quiz-nav-buttons').classList.add('hidden');
    document.querySelectorAll('.quiz-step').forEach(step => {
        step.classList.add('hidden');
    });
    document.getElementById('quiz-results-section').classList.remove('hidden');

    const matchedPrograms = filterProgramsByQuiz();
    const container = document.getElementById('quiz-recommended-programs');

    if (matchedPrograms.length === 0) {
        container.innerHTML = `
            <div class="text-center py-8">
                <p class="text-gray-600 text-lg mb-4">We couldn't find exact matches, but we have many great programs!</p>
                <a href="/programs" class="text-blue-600 font-bold hover:underline">Browse All Programs</a>
            </div>
        `;
        return;
    }

    // Show top 3 matches
    const topMatches = matchedPrograms.slice(0, 3);
    container.innerHTML = topMatches.map(program => {
        const typeColors = {
            'online': 'bg-blue-100 text-blue-800',
            'odl': 'bg-green-100 text-green-800',
            'work-linked': 'bg-cyan-100 text-cyan-800',
            'executive': 'bg-orange-100 text-orange-800'
        };
        const typeClass = typeColors[program.type] || 'bg-gray-100 text-gray-800';

        return `
            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <span class="px-3 py-1 ${typeClass} text-xs font-semibold rounded-full uppercase mb-2 inline-block">
                            ${program.type}
                        </span>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">${program.name}</h3>
                        <p class="text-gray-600 flex items-center">
                            <i class="fas fa-university mr-2"></i>
                            ${program.university ? program.university.name : 'N/A'}
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Program Fees</p>
                        <p class="text-2xl font-black text-blue-600">${formatCurrency(program.fees)}</p>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-200">
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                        ${program.duration ? `<span><i class="fas fa-clock mr-1"></i>${program.duration}</span>` : ''}
                        ${program.mode ? `<span><i class="fas fa-laptop mr-1"></i>${program.mode}</span>` : ''}
                    </div>
                    <a href="/programs/${program.id}" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-full font-bold hover:shadow-lg transform hover:scale-105 transition-all">
                        View Details
                    </a>
                </div>
            </div>
        `;
    }).join('');
}

// Initialize quiz
document.addEventListener('DOMContentLoaded', function() {
    // Choice selection
    document.querySelectorAll('.quiz-choice').forEach(choice => {
        choice.addEventListener('click', function() {
            const step = this.closest('.quiz-step');
            const stepNum = parseInt(step.dataset.step);

            // Remove selected from siblings
            step.querySelectorAll('.quiz-choice').forEach(c => {
                c.classList.remove('selected');
            });

            // Add selected to clicked choice
            this.classList.add('selected');

            // Store answer
            quizAnswers[stepNum] = this.dataset.answer;

            // Enable next button
            document.getElementById('quiz-next-btn').disabled = false;
        });
    });

    // Next button
    document.getElementById('quiz-next-btn').addEventListener('click', function() {
        if (quizCurrentStep < quizTotalSteps) {
            quizCurrentStep++;
            showQuizStep(quizCurrentStep);
            updateQuizProgress();
        } else {
            showQuizResults();
        }
    });

    // Previous button
    document.getElementById('quiz-prev-btn').addEventListener('click', function() {
        if (quizCurrentStep > 1) {
            quizCurrentStep--;
            showQuizStep(quizCurrentStep);
            updateQuizProgress();
        }
    });

    // Close on outside click
    document.getElementById('careerQuizModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeQuizModal();
        }
    });
});
</script>

