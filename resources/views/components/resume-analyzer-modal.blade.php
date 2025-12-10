<!-- Resume Analyzer Modal -->
<div id="resumeAnalyzerModal" class="fixed inset-0 bg-black bg-opacity-50 z-[9999] flex items-center justify-center p-4 sm:p-6 lg:p-8" style="display: none;">
    <div class="modal-content bg-white rounded-2xl sm:rounded-3xl w-full max-w-4xl max-h-[90vh] sm:max-h-[85vh] overflow-y-auto shadow-2xl mx-auto my-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-gradient-to-r from-blue-500 to-cyan-500 text-white p-3 sm:p-4 rounded-t-2xl sm:rounded-t-3xl shadow-lg z-10">
            <div class="flex justify-between items-center gap-3">
                <div class="flex-1 min-w-0">
                    <h3 class="text-base sm:text-lg font-semibold truncate">🎯 Career Match Tool</h3>
                    <p class="text-xs opacity-90">Upload your resume and discover perfect programs!</p>
                </div>
                <button onclick="closeResumeModal()" class="text-white hover:bg-white/20 rounded-full p-1.5 transition flex-shrink-0">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-4 sm:p-6">
            <!-- Step 1: Upload Resume -->
            <div id="upload-step" class="step-content">
                <div class="text-center mb-5">
                    <div class="inline-block bg-blue-50 p-2.5 rounded-lg mb-3">
                        <i class="fas fa-magic text-blue-600 text-2xl"></i>
                    </div>
                    <h4 class="text-base sm:text-lg font-medium text-gray-800 mb-1">Find Your Perfect Program</h4>
                    <p class="text-sm text-gray-600">Upload your resume OR tell us about your goals</p>
                </div>

                <!-- Tab Selection -->
                <div class="flex mb-4 bg-gray-100 rounded-lg p-1">
                    <button type="button" onclick="switchTab('resume')" id="resumeTab" class="flex-1 py-2 px-3 rounded-lg text-xs font-medium transition bg-white text-blue-600 shadow-sm">
                        <i class="fas fa-file-upload mr-1"></i><span class="hidden xs:inline">Upload </span>Resume
                    </button>
                    <button type="button" onclick="switchTab('text')" id="textTab" class="flex-1 py-2 px-3 rounded-lg text-xs font-medium transition text-gray-600">
                        <i class="fas fa-keyboard mr-1"></i><span class="hidden xs:inline">Describe </span>Goals
                    </button>
                </div>

                <form id="resumeUploadForm" class="space-y-4 sm:space-y-6">
                    <!-- Resume Upload Tab -->
                    <div id="resumeUploadTab" class="tab-content">
                        <!-- File Upload Area -->
                        <div class="border border-dashed border-blue-300 rounded-lg p-5 text-center hover:border-blue-400 transition cursor-pointer bg-blue-50/30" onclick="document.getElementById('resumeFile').click()">
                            <i class="fas fa-cloud-upload-alt text-blue-400 text-3xl mb-3"></i>
                            <p class="text-sm font-medium text-gray-700 mb-1">Click to upload or drag and drop</p>
                            <p class="text-xs text-gray-500">PDF, DOC, DOCX (Max 5MB)</p>
                            <input type="file" id="resumeFile" name="resume" accept=".pdf,.doc,.docx" class="hidden" onchange="handleFileSelect(this)">
                            <div id="fileName" class="mt-3 text-blue-600 font-medium hidden text-sm"></div>
                        </div>
                    </div>

                    <!-- Text Input Tab -->
                    <div id="textInputTab" class="tab-content hidden">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Tell us about yourself and your goals 💭
                                </label>
                                <textarea
                                    id="userInput"
                                    name="user_input"
                                    rows="8"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                    placeholder="Example: I'm a software engineer with 5 years of experience in Python and machine learning. I want to transition into a leadership role and learn more about business strategy and management. I have a Bachelor's degree in Computer Science and I'm looking for programs that can help me develop my management skills while leveraging my technical background..."
                                ></textarea>
                                <p class="text-xs text-gray-500 mt-2">
                                    <i class="fas fa-lightbulb text-yellow-500 mr-1"></i>
                                    Tip: Include your education, work experience, skills, and career goals for better recommendations
                                </p>
                            </div>

                            <!-- Quick prompts -->
                            <div class="bg-blue-50 rounded-xl p-4">
                                <p class="text-sm font-semibold text-gray-700 mb-2">Quick prompts to help you:</p>
                                <div class="space-y-2">
                                    <button type="button" onclick="fillPrompt('career-change')" class="text-left w-full text-sm text-blue-600 hover:text-blue-800 hover:bg-blue-100 px-3 py-2 rounded-lg transition">
                                        <i class="fas fa-arrow-right mr-2"></i>I want to change my career path
                                    </button>
                                    <button type="button" onclick="fillPrompt('skill-upgrade')" class="text-left w-full text-sm text-blue-600 hover:text-blue-800 hover:bg-blue-100 px-3 py-2 rounded-lg transition">
                                        <i class="fas fa-arrow-right mr-2"></i>I want to upgrade my skills
                                    </button>
                                    <button type="button" onclick="fillPrompt('leadership')" class="text-left w-full text-sm text-blue-600 hover:text-blue-800 hover:bg-blue-100 px-3 py-2 rounded-lg transition">
                                        <i class="fas fa-arrow-right mr-2"></i>I want to move into leadership
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Optional Contact Info -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Name (Optional)</label>
                            <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Your name">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email (Optional)</label>
                            <input type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="your@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone (Optional)</label>
                            <input type="tel" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="+91 XXXXX XXXXX">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 text-white py-3 sm:py-4 rounded-lg sm:rounded-xl font-bold text-base sm:text-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center justify-center space-x-2">
                        <i class="fas fa-magic"></i>
                        <span>Analyze My Resume</span>
                    </button>
                </form>
            </div>

            <!-- Step 2: Loading -->
            <div id="loading-step" class="step-content hidden">
                <div class="text-center py-12">
                    <div class="inline-block">
                        <div class="animate-spin rounded-full h-24 w-24 border-b-4 border-blue-600 mb-6"></div>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-800 mb-2">Analyzing Your Resume...</h4>
                    <p class="text-gray-600">Our AI is extracting keywords, skills, and matching programs</p>
                    <div class="mt-8 space-y-3">
                        <div class="flex items-center justify-center space-x-2 text-gray-600">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>Extracting text from resume</span>
                        </div>
                        <div class="flex items-center justify-center space-x-2 text-gray-600">
                            <i class="fas fa-spinner fa-spin text-blue-500"></i>
                            <span>Identifying skills and keywords</span>
                        </div>
                        <div class="flex items-center justify-center space-x-2 text-gray-400">
                            <i class="fas fa-circle text-gray-300"></i>
                            <span>Matching with programs</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Preferences -->
            <div id="preferences-step" class="step-content hidden">
                <div class="text-center mb-8">
                    <div class="inline-block bg-cyan-100 p-4 rounded-full mb-4">
                        <i class="fas fa-bullseye text-cyan-600 text-4xl"></i>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-800 mb-2">Tell Us More About Your Goals</h4>
                    <p class="text-gray-600">Help us refine your program recommendations</p>
                </div>

                <form id="preferencesForm" class="space-y-6">
                    <input type="hidden" id="resumeAnalysisId" name="analysis_id">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">What are your career goals?</label>
                        <textarea name="career_goals" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-transparent" placeholder="E.g., Become a data scientist, transition to management, start my own business..."></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Preferred Field of Study</label>
                        <select name="preferred_field" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                            <option value="">Select a field</option>
                            <option value="business">Business & Management</option>
                            <option value="technology">Technology & IT</option>
                            <option value="data">Data Science & Analytics</option>
                            <option value="marketing">Marketing & Digital</option>
                            <option value="finance">Finance & Accounting</option>
                            <option value="healthcare">Healthcare Management</option>
                            <option value="engineering">Engineering</option>
                            <option value="design">Design & Creative</option>
                            <option value="education">Education</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="flex space-x-4">
                        <button type="button" onclick="skipPreferences()" class="flex-1 bg-gray-200 text-gray-700 py-4 rounded-xl font-bold text-lg hover:bg-gray-300 transition">
                            Skip
                        </button>
                        <button type="submit" class="flex-1 bg-gradient-to-r from-cyan-600 to-pink-600 text-white py-4 rounded-xl font-bold text-lg hover:shadow-xl transform hover:scale-105 transition-all">
                            Continue
                        </button>
                    </div>
                </form>
            </div>

            <!-- Step 4: Results -->
            <div id="results-step" class="step-content hidden">
                <!-- Analysis Summary -->
                <div id="analysisSummary" class="mb-8">
                    <!-- Will be populated by JavaScript -->
                </div>

                <!-- Matched Programs -->
                <div>
                    <h4 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-3"></i>
                        Your Recommended Programs
                    </h4>
                    <div id="matchedPrograms" class="space-y-4">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex space-x-4">
                    <button onclick="closeResumeModal()" class="flex-1 bg-gray-200 text-gray-700 py-4 rounded-xl font-bold text-lg hover:bg-gray-300 transition">
                        Close
                    </button>
                    <a href="/programs" class="flex-1 bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-4 rounded-xl font-bold text-lg hover:shadow-xl transform hover:scale-105 transition-all text-center">
                        View All Programs
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
let currentAnalysisId = null;
let currentAnalysisData = null;
let currentTab = 'resume';

function openResumeModal() {
    const modal = document.getElementById('resumeAnalyzerModal');
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
    
    showStep('upload-step');
    switchTab('resume');
}

function closeResumeModal() {
    const modal = document.getElementById('resumeAnalyzerModal');
    modal.classList.add('hidden');
    modal.style.display = 'none';
    
    // Restore body scroll with proper scrollbar handling
    if (typeof restoreBodyScroll === 'function') {
        restoreBodyScroll();
    } else {
        document.body.style.overflow = 'auto';
    }
    
    resetModal();
}

function showStep(stepId) {
    document.querySelectorAll('.step-content').forEach(step => {
        step.classList.add('hidden');
    });
    document.getElementById(stepId).classList.remove('hidden');
}

function switchTab(tab) {
    currentTab = tab;

    // Update tab buttons
    const resumeTab = document.getElementById('resumeTab');
    const textTab = document.getElementById('textTab');

    if (tab === 'resume') {
        resumeTab.classList.add('bg-white', 'text-blue-600', 'shadow');
        resumeTab.classList.remove('text-gray-600');
        textTab.classList.remove('bg-white', 'text-blue-600', 'shadow');
        textTab.classList.add('text-gray-600');

        document.getElementById('resumeUploadTab').classList.remove('hidden');
        document.getElementById('textInputTab').classList.add('hidden');
    } else {
        textTab.classList.add('bg-white', 'text-blue-600', 'shadow');
        textTab.classList.remove('text-gray-600');
        resumeTab.classList.remove('bg-white', 'text-blue-600', 'shadow');
        resumeTab.classList.add('text-gray-600');

        document.getElementById('textInputTab').classList.remove('hidden');
        document.getElementById('resumeUploadTab').classList.add('hidden');
    }
}

function fillPrompt(type) {
    const textarea = document.getElementById('userInput');
    let prompt = '';

    switch(type) {
        case 'career-change':
            prompt = "I'm currently working as a [your current role] with [X] years of experience. I have skills in [list your skills]. I want to transition into [desired field/role] because [your reasons]. I'm looking for programs that can help me make this career change successfully.";
            break;
        case 'skill-upgrade':
            prompt = "I'm a [your role] with [X] years of experience. I have a [your degree] in [field]. I want to upgrade my skills in [specific areas] to stay competitive in my field and advance my career. I'm particularly interested in [specific topics/technologies].";
            break;
        case 'leadership':
            prompt = "I'm currently a [your role] with [X] years of experience in [industry/field]. I have strong technical skills in [list skills] and I'm ready to move into a leadership position. I want to develop my management, strategy, and business skills while leveraging my technical background.";
            break;
    }

    textarea.value = prompt;
    textarea.focus();
}

function handleFileSelect(input) {
    if (input.files && input.files[0]) {
        const fileName = input.files[0].name;
        const fileNameDiv = document.getElementById('fileName');
        fileNameDiv.textContent = '✓ ' + fileName;
        fileNameDiv.classList.remove('hidden');
    }
}

document.getElementById('resumeUploadForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    // Validate based on current tab
    if (currentTab === 'resume') {
        const fileInput = document.getElementById('resumeFile');
        if (!fileInput.files || fileInput.files.length === 0) {
            alert('Please select a resume file to upload');
            return;
        }
    } else {
        const textInput = document.getElementById('userInput');
        if (!textInput.value.trim()) {
            alert('Please describe your goals and background');
            return;
        }
    }

    showStep('loading-step');

    try {
        const response = await fetch('/api/v1/resume/upload', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        const result = await response.json();

        if (result.success) {
            currentAnalysisId = result.data.id;
            currentAnalysisData = result.data;
            showStep('preferences-step');
            document.getElementById('resumeAnalysisId').value = currentAnalysisId;
        } else {
            alert(result.message || 'Error analyzing. Please try again.');
            showStep('upload-step');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error processing your request. Please try again.');
        showStep('upload-step');
    }
});

document.getElementById('preferencesForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const data = {
        career_goals: formData.get('career_goals'),
        preferred_field: formData.get('preferred_field')
    };

    try {
        const response = await fetch(`/api/resume/${currentAnalysisId}/preferences`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (result.success) {
            currentAnalysisData.matched_programs = result.matched_programs;
            displayResults();
        }
    } catch (error) {
        console.error('Error:', error);
        displayResults();
    }
});

function skipPreferences() {
    displayResults();
}

function displayResults() {
    const analysis = currentAnalysisData.analysis;
    const programs = currentAnalysisData.matched_programs;

    // Display analysis summary
    const summaryHtml = `
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-6 mb-6">
            <h4 class="text-xl font-bold text-gray-800 mb-4">📊 Your Profile Summary</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white rounded-xl p-4">
                    <p class="text-sm text-gray-600 mb-1">Highest Qualification</p>
                    <p class="text-lg font-bold text-blue-600">${analysis.highest_qualification || 'Not specified'}</p>
                </div>
                <div class="bg-white rounded-xl p-4">
                    <p class="text-sm text-gray-600 mb-1">Years of Experience</p>
                    <p class="text-lg font-bold text-blue-600">${analysis.years_of_experience || 0} years</p>
                </div>
            </div>
            ${analysis.skills && analysis.skills.length > 0 ? `
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Key Skills Identified:</p>
                    <div class="flex flex-wrap gap-2">
                        ${analysis.skills.slice(0, 10).map(skill => `
                            <span class="bg-white px-3 py-1 rounded-full text-sm font-semibold text-blue-600">
                                ${skill}
                            </span>
                        `).join('')}
                    </div>
                </div>
            ` : ''}
        </div>
    `;
    document.getElementById('analysisSummary').innerHTML = summaryHtml;

    // Display matched programs
    if (programs && programs.length > 0) {
        const programsHtml = programs.map((program, index) => `
            <div class="bg-white border-2 border-gray-200 rounded-2xl p-6 hover:border-blue-500 hover:shadow-xl transition-all">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                ${program.match_score}% Match
                            </span>
                            <span class="text-yellow-500">
                                ${'⭐'.repeat(Math.min(5, Math.ceil(program.match_score / 20)))}
                            </span>
                        </div>
                        <h5 class="text-xl font-bold text-gray-800 mb-1">${program.program_name}</h5>
                        <p class="text-sm text-gray-600 mb-3">
                            <i class="fas fa-university text-blue-500 mr-1"></i>
                            ${program.university_name}
                        </p>
                        <div class="flex flex-wrap gap-4 text-sm text-gray-600 mb-3">
                            ${program.duration ? `
                                <span><i class="fas fa-clock text-blue-500 mr-1"></i>${program.duration}</span>
                            ` : ''}
                            ${program.fees ? `
                                <span><i class="fas fa-rupee-sign text-blue-500 mr-1"></i>${program.fees}</span>
                            ` : ''}
                        </div>
                        ${program.reasons && program.reasons.length > 0 ? `
                            <div class="space-y-1">
                                ${program.reasons.slice(0, 3).map(reason => `
                                    <p class="text-sm text-green-600 flex items-start">
                                        <i class="fas fa-check-circle mr-2 mt-1"></i>
                                        <span>${reason}</span>
                                    </p>
                                `).join('')}
                            </div>
                        ` : ''}
                    </div>
                </div>
                <a href="/programs/${program.program_id}" class="block w-full bg-gradient-to-r from-blue-600 to-cyan-600 text-white py-3 rounded-xl font-bold text-center hover:shadow-lg transition">
                    View Program Details
                </a>
            </div>
        `).join('');
        document.getElementById('matchedPrograms').innerHTML = programsHtml;
    } else {
        document.getElementById('matchedPrograms').innerHTML = `
            <div class="text-center py-8 bg-gray-50 rounded-2xl">
                <i class="fas fa-search text-gray-400 text-4xl mb-4"></i>
                <p class="text-gray-600">No matching programs found. Please browse all programs.</p>
            </div>
        `;
    }

    showStep('results-step');
}

function resetModal() {
    document.getElementById('resumeUploadForm').reset();
    document.getElementById('preferencesForm').reset();
    document.getElementById('fileName').classList.add('hidden');
    document.getElementById('userInput').value = '';
    currentAnalysisId = null;
    currentAnalysisData = null;
    currentTab = 'resume';
}

// Close modal on outside click
document.getElementById('resumeAnalyzerModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeResumeModal();
    }
});
</script>

<style>
    /* Modal Positioning and Responsiveness */
    #resumeAnalyzerModal {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    #resumeAnalyzerModal > div {
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #resumeAnalyzerModal[style*="flex"] > div {
        transform: scale(1);
        opacity: 1;
    }

    /* Responsive Modal Sizing */
    @media (max-width: 640px) {
        #resumeAnalyzerModal {
            padding: 1rem !important;
        }
        
        #resumeAnalyzerModal > div {
            max-height: 95vh !important;
            margin: auto;
        }
    }

    @media (max-width: 480px) {
        #resumeAnalyzerModal {
            padding: 0.5rem !important;
        }
        
        #resumeAnalyzerModal > div {
            max-height: 98vh !important;
            border-radius: 1rem !important;
        }
    }

    /* Ensure modal content is scrollable on small screens */
    @media (max-height: 600px) {
        #resumeAnalyzerModal > div {
            max-height: 95vh !important;
        }
    }

    /* Custom Scrollbar Styling */
    #resumeAnalyzerModal > div::-webkit-scrollbar {
        width: 6px;
    }

    #resumeAnalyzerModal > div::-webkit-scrollbar-track {
        background: transparent;
    }

    #resumeAnalyzerModal > div::-webkit-scrollbar-thumb {
        background: rgba(156, 163, 175, 0.5);
        border-radius: 3px;
    }

    #resumeAnalyzerModal > div::-webkit-scrollbar-thumb:hover {
        background: rgba(156, 163, 175, 0.8);
    }

    /* Hide scrollbar for Firefox */
    #resumeAnalyzerModal > div {
        scrollbar-width: thin;
        scrollbar-color: rgba(156, 163, 175, 0.5) transparent;
    }

    /* Prevent body scroll when modal is open */
    body.modal-open {
        overflow: hidden !important;
        padding-right: 0px !important;
    }
</style>

