@extends('layouts.admin')

@section('title', 'Resume Analyses - Admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Resume Analyses</h1>
            <p class="text-gray-600 mt-2">View and manage uploaded resumes</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Uploads</p>
                    <p id="total-uploads" class="text-3xl font-bold text-indigo-600">0</p>
                </div>
                <i class="fas fa-file-upload text-indigo-600 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Today</p>
                    <p id="today-uploads" class="text-3xl font-bold text-green-600">0</p>
                </div>
                <i class="fas fa-calendar-day text-green-600 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">This Week</p>
                    <p id="week-uploads" class="text-3xl font-bold text-purple-600">0</p>
                </div>
                <i class="fas fa-calendar-week text-purple-600 text-3xl"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Avg Match Score</p>
                    <p id="avg-score" class="text-3xl font-bold text-orange-600">0%</p>
                </div>
                <i class="fas fa-chart-line text-orange-600 text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input type="text" id="search-name" placeholder="Search by name..." class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
            <input type="email" id="search-email" placeholder="Search by email..." class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
            <select id="filter-qualification" class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                <option value="">All Qualifications</option>
                <option value="phd">PhD/Doctorate</option>
                <option value="master">Master's</option>
                <option value="bachelor">Bachelor's</option>
            </select>
            <button onclick="applyFilters()" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                <i class="fas fa-filter mr-2"></i>Apply Filters
            </button>
        </div>
    </div>

    <!-- Resume List -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Qualification</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Experience</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Top Skills</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Uploaded</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody id="resume-list" class="bg-white divide-y divide-gray-200">
                    <!-- Will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Empty State -->
    <div id="empty-state" class="hidden text-center py-12">
        <i class="fas fa-inbox text-gray-400 text-6xl mb-4"></i>
        <p class="text-gray-600 text-lg">No resume analyses found</p>
    </div>
</div>

<!-- View Details Modal -->
<div id="detailsModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="sticky top-0 bg-indigo-600 text-white p-6 rounded-t-lg">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl font-bold">Resume Analysis Details</h3>
                <button onclick="closeDetailsModal()" class="text-white hover:bg-white/20 rounded-full p-2">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div id="modal-content" class="p-6">
            <!-- Will be populated by JavaScript -->
        </div>
    </div>
</div>

<script>
let allResumes = [];

async function loadResumes() {
    try {
        showLoading();
        const response = await apiRequest('/admin/resume-analyses', 'GET');

        if (response.success) {
            allResumes = response.data;
            displayResumes(allResumes);
            updateStats(allResumes);
        }
    } catch (error) {
        showToast('Failed to load resumes', 'error');
    } finally {
        hideLoading();
    }
}

function displayResumes(resumes) {
    const tbody = document.getElementById('resume-list');
    const emptyState = document.getElementById('empty-state');

    if (resumes.length === 0) {
        tbody.innerHTML = '';
        emptyState.classList.remove('hidden');
        return;
    }

    emptyState.classList.add('hidden');

    tbody.innerHTML = resumes.map(resume => `
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#${resume.id}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">${resume.name || 'Anonymous'}</div>
                <div class="text-sm text-gray-500">${resume.file_name}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">${resume.email || 'N/A'}</div>
                <div class="text-sm text-gray-500">${resume.phone || 'N/A'}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                    ${resume.highest_qualification || 'N/A'}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                ${resume.years_of_experience || 0} years
            </td>
            <td class="px-6 py-4">
                <div class="flex flex-wrap gap-1">
                    ${(resume.skills || []).slice(0, 3).map(skill => `
                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded">${skill}</span>
                    `).join('')}
                    ${(resume.skills || []).length > 3 ? `<span class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded">+${(resume.skills || []).length - 3}</span>` : ''}
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                ${formatDate(resume.created_at)}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <button onclick="viewDetails(${resume.id})" class="text-indigo-600 hover:text-indigo-900 mr-3">
                    <i class="fas fa-eye"></i> View
                </button>
                <a href="/storage/${resume.file_path}" target="_blank" class="text-green-600 hover:text-green-900">
                    <i class="fas fa-download"></i> Download
                </a>
            </td>
        </tr>
    `).join('');
}

function updateStats(resumes) {
    document.getElementById('total-uploads').textContent = resumes.length;

    const today = new Date().toDateString();
    const todayCount = resumes.filter(r => new Date(r.created_at).toDateString() === today).length;
    document.getElementById('today-uploads').textContent = todayCount;

    const weekAgo = new Date();
    weekAgo.setDate(weekAgo.getDate() - 7);
    const weekCount = resumes.filter(r => new Date(r.created_at) >= weekAgo).length;
    document.getElementById('week-uploads').textContent = weekCount;

    // Calculate average match score
    let totalScore = 0;
    let count = 0;
    resumes.forEach(r => {
        if (r.matched_programs && r.matched_programs.length > 0) {
            totalScore += r.matched_programs[0].match_score || 0;
            count++;
        }
    });
    const avgScore = count > 0 ? Math.round(totalScore / count) : 0;
    document.getElementById('avg-score').textContent = avgScore + '%';
}

function applyFilters() {
    const nameFilter = document.getElementById('search-name').value.toLowerCase();
    const emailFilter = document.getElementById('search-email').value.toLowerCase();
    const qualFilter = document.getElementById('filter-qualification').value.toLowerCase();

    const filtered = allResumes.filter(resume => {
        const matchName = !nameFilter || (resume.name || '').toLowerCase().includes(nameFilter);
        const matchEmail = !emailFilter || (resume.email || '').toLowerCase().includes(emailFilter);
        const matchQual = !qualFilter || (resume.highest_qualification || '').toLowerCase().includes(qualFilter);

        return matchName && matchEmail && matchQual;
    });

    displayResumes(filtered);
}

function viewDetails(id) {
    const resume = allResumes.find(r => r.id === id);
    if (!resume) return;

    const modalContent = document.getElementById('modal-content');
    modalContent.innerHTML = `
        <div class="space-y-6">
            <!-- Personal Info -->
            <div class="bg-gray-50 rounded-lg p-4">
                <h4 class="font-bold text-lg mb-3">Personal Information</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Name</p>
                        <p class="font-semibold">${resume.name || 'N/A'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Email</p>
                        <p class="font-semibold">${resume.email || 'N/A'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Phone</p>
                        <p class="font-semibold">${resume.phone || 'N/A'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Uploaded</p>
                        <p class="font-semibold">${formatDate(resume.created_at)}</p>
                    </div>
                </div>
            </div>

            <!-- Analysis Summary -->
            <div class="bg-indigo-50 rounded-lg p-4">
                <h4 class="font-bold text-lg mb-3">Analysis Summary</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Highest Qualification</p>
                        <p class="font-semibold text-indigo-600">${resume.highest_qualification || 'N/A'}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Years of Experience</p>
                        <p class="font-semibold text-indigo-600">${resume.years_of_experience || 0} years</p>
                    </div>
                </div>
            </div>

            <!-- Skills -->
            ${resume.skills && resume.skills.length > 0 ? `
                <div>
                    <h4 class="font-bold text-lg mb-3">Skills Identified</h4>
                    <div class="flex flex-wrap gap-2">
                        ${resume.skills.map(skill => `
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">${skill}</span>
                        `).join('')}
                    </div>
                </div>
            ` : ''}

            <!-- Keywords -->
            ${resume.keywords && resume.keywords.length > 0 ? `
                <div>
                    <h4 class="font-bold text-lg mb-3">Keywords</h4>
                    <div class="flex flex-wrap gap-2">
                        ${resume.keywords.map(keyword => `
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">${keyword}</span>
                        `).join('')}
                    </div>
                </div>
            ` : ''}

            <!-- Matched Programs -->
            ${resume.matched_programs && resume.matched_programs.length > 0 ? `
                <div>
                    <h4 class="font-bold text-lg mb-3">Matched Programs</h4>
                    <div class="space-y-3">
                        ${resume.matched_programs.map(program => `
                            <div class="border rounded-lg p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h5 class="font-bold">${program.program_name}</h5>
                                    <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                        ${program.match_score}% Match
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mb-2">${program.university_name}</p>
                                ${program.reasons && program.reasons.length > 0 ? `
                                    <ul class="text-sm space-y-1">
                                        ${program.reasons.map(reason => `
                                            <li class="text-green-600"><i class="fas fa-check mr-2"></i>${reason}</li>
                                        `).join('')}
                                    </ul>
                                ` : ''}
                            </div>
                        `).join('')}
                    </div>
                </div>
            ` : ''}
        </div>
    `;

    document.getElementById('detailsModal').classList.remove('hidden');
}

function closeDetailsModal() {
    document.getElementById('detailsModal').classList.add('hidden');
}

// Load resumes on page load
document.addEventListener('DOMContentLoaded', loadResumes);
</script>
@endsection
