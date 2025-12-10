@extends('layouts.admin')

@section('page-title', 'Home Page Control')

@section('admin-content')
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-home text-indigo-600 mr-3"></i>
                Home Page Control
            </h2>
            <p class="text-gray-600 mt-1">Customize your home page content and settings</p>
        </div>
        <button onclick="saveAllSettings()" class="px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center space-x-2">
            <i class="fas fa-save"></i>
            <span>Save All Changes</span>
        </button>
    </div>
</div>

<!-- Tabs -->
<div class="mb-6 bg-white rounded-lg shadow-sm p-2">
    <div class="flex flex-wrap gap-2">
        <button onclick="showSection('hero')" id="tab-hero" class="tab-btn active px-6 py-3 rounded-lg font-semibold transition">
            <i class="fas fa-rocket mr-2"></i>Hero Section
        </button>
        <button onclick="showSection('backgrounds')" id="tab-backgrounds" class="tab-btn px-6 py-3 rounded-lg font-semibold transition">
            <i class="fas fa-images mr-2"></i>Hero Backgrounds
        </button>
        <button onclick="showSection('stats')" id="tab-stats" class="tab-btn px-6 py-3 rounded-lg font-semibold transition">
            <i class="fas fa-chart-bar mr-2"></i>Statistics
        </button>
        <button onclick="showSection('benefits')" id="tab-benefits" class="tab-btn px-6 py-3 rounded-lg font-semibold transition">
            <i class="fas fa-gift mr-2"></i>Benefits
        </button>
        <button onclick="showSection('offer')" id="tab-offer" class="tab-btn px-6 py-3 rounded-lg font-semibold transition">
            <i class="fas fa-tag mr-2"></i>Offer Banner
        </button>
        <button onclick="showSection('contact')" id="tab-contact" class="tab-btn px-6 py-3 rounded-lg font-semibold transition">
            <i class="fas fa-phone mr-2"></i>Contact Info
        </button>
        <button onclick="showSection('social')" id="tab-social" class="tab-btn px-6 py-3 rounded-lg font-semibold transition">
            <i class="fas fa-share-alt mr-2"></i>Social Media
        </button>
    </div>
</div>

<!-- Hero Section -->
<div id="section-hero" class="section-content">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-rocket text-indigo-600 mr-3"></i>
            Hero Section Settings
        </h3>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-heading text-indigo-600 mr-2"></i>Hero Badge
                </label>
                <input type="text" id="hero_badge" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="🎓 #1 Online Education Platform">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-heading text-indigo-600 mr-2"></i>Main Title
                </label>
                <input type="text" id="hero_title" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Transform Your Future Today!">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-text-height text-indigo-600 mr-2"></i>Subtitle
                </label>
                <input type="text" id="hero_subtitle" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="🚀 Your Gateway to Quality Education">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-align-left text-indigo-600 mr-2"></i>Description
                </label>
                <textarea id="hero_description" rows="3" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Join 10,000+ successful professionals..."></textarea>
            </div>
        </div>
    </div>
</div>

<!-- Hero Backgrounds Section -->
<div id="section-backgrounds" class="section-content hidden">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-images text-indigo-600 mr-3"></i>
                Hero Background Images
            </h3>
            <button onclick="openAddBackgroundModal()" class="px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center space-x-2">
                <i class="fas fa-plus"></i>
                <span>Add Background</span>
            </button>
        </div>

        <div class="mb-6 p-4 bg-blue-50 border-l-4 border-blue-600 rounded">
            <p class="text-sm text-gray-700">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                <strong>Tip:</strong> Add multiple background images to create a slideshow effect. Drag to reorder, and choose animation types for smooth transitions.
            </p>
        </div>

        <!-- Backgrounds Grid -->
        <div id="backgrounds-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Will be populated by JavaScript -->
        </div>

        <!-- Empty State -->
        <div id="backgrounds-empty" class="hidden text-center py-12">
            <i class="fas fa-images text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500 text-lg mb-4">No background images yet</p>
            <button onclick="openAddBackgroundModal()" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                <i class="fas fa-plus mr-2"></i>Add First Background
            </button>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div id="section-stats" class="section-content hidden">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-chart-bar text-indigo-600 mr-3"></i>
            Statistics Settings
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-graduation-cap text-indigo-600 mr-2"></i>Number of Programs
                </label>
                <input type="number" id="stat_programs" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="10">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-university text-green-600 mr-2"></i>Number of Universities
                </label>
                <input type="number" id="stat_universities" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="8">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-users text-purple-600 mr-2"></i>Number of Students
                </label>
                <input type="number" id="stat_students" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="10000">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-trophy text-orange-600 mr-2"></i>Success Rate (%)
                </label>
                <input type="number" id="stat_success_rate" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="95">
            </div>
        </div>
    </div>
</div>

<!-- Benefits Section -->
<div id="section-benefits" class="section-content hidden">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-gift text-indigo-600 mr-3"></i>
            Benefits Section Settings
        </h3>

        <div class="space-y-8">
            <!-- Benefit 1 -->
            <div class="border-l-4 border-indigo-600 pl-6">
                <h4 class="text-lg font-bold text-gray-800 mb-4">💰 Benefit 1</h4>
                <div class="space-y-4">
                    <input type="text" id="benefit_1_title" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Title">
                    <textarea id="benefit_1_description" rows="2" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Description"></textarea>
                    <input type="text" id="benefit_1_badge" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Badge Text">
                </div>
            </div>

            <!-- Benefit 2 -->
            <div class="border-l-4 border-green-600 pl-6">
                <h4 class="text-lg font-bold text-gray-800 mb-4">🎯 Benefit 2</h4>
                <div class="space-y-4">
                    <input type="text" id="benefit_2_title" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Title">
                    <textarea id="benefit_2_description" rows="2" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Description"></textarea>
                    <input type="text" id="benefit_2_badge" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Badge Text">
                </div>
            </div>

            <!-- Benefit 3 -->
            <div class="border-l-4 border-purple-600 pl-6">
                <h4 class="text-lg font-bold text-gray-800 mb-4">⚡ Benefit 3</h4>
                <div class="space-y-4">
                    <input type="text" id="benefit_3_title" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Title">
                    <textarea id="benefit_3_description" rows="2" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Description"></textarea>
                    <input type="text" id="benefit_3_badge" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Badge Text">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offer Banner Section -->
<div id="section-offer" class="section-content hidden">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-tag text-indigo-600 mr-3"></i>
            Offer Banner Settings
        </h3>

        <div class="space-y-6">
            <div>
                <label class="flex items-center space-x-3 cursor-pointer">
                    <input type="checkbox" id="offer_banner_enabled" class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <span class="text-sm font-bold text-gray-700">
                        <i class="fas fa-eye text-green-600 mr-2"></i>Show Offer Banner
                    </span>
                </label>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-bullhorn text-indigo-600 mr-2"></i>Offer Banner Text
                </label>
                <input type="text" id="offer_banner_text" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="🎉 Limited Time: Get 20% OFF!">
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<div id="section-contact" class="section-content hidden">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-phone text-indigo-600 mr-3"></i>
            Contact Information
        </h3>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-envelope text-indigo-600 mr-2"></i>Email Address
                </label>
                <input type="email" id="contact_email" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="info@digivarsity.com">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-phone text-green-600 mr-2"></i>Phone Number
                </label>
                <input type="text" id="contact_phone" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="+91 1234567890">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>Location
                </label>
                <input type="text" id="contact_location" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Mumbai, India">
            </div>
        </div>
    </div>
</div>

<!-- Social Media Section -->
<div id="section-social" class="section-content hidden">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-share-alt text-indigo-600 mr-3"></i>
            Social Media Links
        </h3>

        <div class="space-y-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fab fa-facebook text-blue-600 mr-2"></i>Facebook URL
                </label>
                <input type="url" id="social_facebook" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://facebook.com/yourpage">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fab fa-twitter text-blue-400 mr-2"></i>Twitter URL
                </label>
                <input type="url" id="social_twitter" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://twitter.com/yourhandle">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fab fa-linkedin text-blue-700 mr-2"></i>LinkedIn URL
                </label>
                <input type="url" id="social_linkedin" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://linkedin.com/company/yourcompany">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fab fa-instagram text-pink-600 mr-2"></i>Instagram URL
                </label>
                <input type="url" id="social_instagram" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://instagram.com/yourprofile">
            </div>
        </div>
    </div>
</div>

<!-- Preview Button -->
<div class="mt-8 text-center">
    <a href="/" target="_blank" class="inline-flex items-center space-x-2 px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full font-bold hover:shadow-xl transform hover:scale-105 transition-all">
        <i class="fas fa-eye"></i>
        <span>Preview Home Page</span>
        <i class="fas fa-external-link-alt"></i>
    </a>
</div>

<!-- Background Image Modal -->
<div id="backgroundModal" class="modal">
    <div class="bg-white rounded-lg p-8 max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 id="background-modal-title" class="text-3xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-image text-indigo-600 mr-3"></i>
                <span>Add Background Image</span>
            </h3>
            <button onclick="closeBackgroundModal()" class="text-gray-400 hover:text-gray-600 text-2xl">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="backgroundForm" onsubmit="handleBackgroundSubmit(event)">
            <input type="hidden" id="background-id">

            <div class="space-y-6">
                <!-- Image Source Type -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">
                        <i class="fas fa-image text-indigo-600 mr-2"></i>Image Source
                    </label>
                    <div class="flex space-x-4">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="image_source" value="url" checked onchange="toggleImageSource()" class="w-4 h-4 text-indigo-600">
                            <span class="font-semibold">Image URL</span>
                        </label>
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="image_source" value="upload" onchange="toggleImageSource()" class="w-4 h-4 text-indigo-600">
                            <span class="font-semibold">Upload Image</span>
                        </label>
                    </div>
                </div>

                <!-- URL Input -->
                <div id="url-input">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-link text-indigo-600 mr-2"></i>Image URL
                    </label>
                    <input type="url" id="bg_image_url" placeholder="https://example.com/image.jpg" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <p class="text-xs text-gray-500 mt-1">Recommended size: 1920x1080px or larger</p>
                </div>

                <!-- File Upload -->
                <div id="file-input" class="hidden">
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-upload text-indigo-600 mr-2"></i>Upload Image
                    </label>
                    <input type="file" id="bg_image_file" accept="image/*" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <p class="text-xs text-gray-500 mt-1">Max size: 5MB. Formats: JPG, PNG, WEBP</p>
                </div>

                <!-- Image Preview -->
                <div id="bg-preview" class="hidden">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Preview</label>
                    <img id="bg-preview-img" src="" alt="Preview" class="w-full h-48 object-cover rounded-lg border-2 border-gray-300">
                </div>

                <!-- Animation Type -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-magic text-purple-600 mr-2"></i>Animation Type
                    </label>
                    <select id="bg_animation_type" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="fade">Fade (Smooth transition)</option>
                        <option value="slide">Slide (Left to right)</option>
                        <option value="zoom">Zoom (Scale effect)</option>
                        <option value="none">None (No animation)</option>
                    </select>
                </div>

                <!-- Animation Duration -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">
                        <i class="fas fa-clock text-orange-600 mr-2"></i>Display Duration (seconds)
                    </label>
                    <input type="number" id="bg_animation_duration" value="5" min="1" max="30" class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <p class="text-xs text-gray-500 mt-1">How long to display this image before transitioning</p>
                </div>

                <!-- Active Toggle -->
                <div>
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="checkbox" id="bg_is_active" checked class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <span class="text-sm font-bold text-gray-700">
                            <i class="fas fa-eye text-green-600 mr-2"></i>Active (Show in slideshow)
                        </span>
                    </label>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-3">
                <button type="button" onclick="closeBackgroundModal()" class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-semibold transition">
                    <i class="fas fa-times mr-2"></i>Cancel
                </button>
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:shadow-xl transform hover:scale-105 transition-all font-bold">
                    <i class="fas fa-save mr-2"></i>Save Background
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let settings = {};

    async function loadSettings() {
        try {
            showLoading();
            const response = await fetch('/api/v1/home-settings');
            const data = await response.json();

            if (data.success) {
                settings = data.data;
                populateFields();
            }
        } catch (error) {
            console.error('Error loading settings:', error);
            showToast('Failed to load settings', 'error');
        } finally {
            hideLoading();
        }
    }

    function populateFields() {
        Object.keys(settings).forEach(key => {
            const element = document.getElementById(key);
            if (element) {
                if (element.type === 'checkbox') {
                    element.checked = settings[key] === 'true' || settings[key] === true;
                } else {
                    element.value = settings[key] || '';
                }
            }
        });
    }

    async function saveAllSettings() {
        const data = {};

        // Collect all input values
        document.querySelectorAll('input, textarea').forEach(element => {
            if (element.id && element.id !== 'search') {
                if (element.type === 'checkbox') {
                    data[element.id] = element.checked;
                } else {
                    data[element.id] = element.value;
                }
            }
        });

        try {
            showLoading();
            const response = await fetch('/api/v1/home-settings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${getAuthToken()}`
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                showToast('Settings saved successfully! 🎉', 'success');
                loadSettings();
            } else {
                throw new Error(result.message || 'Failed to save settings');
            }
        } catch (error) {
            console.error('Error saving settings:', error);
            showToast(error.message || 'Failed to save settings', 'error');
        } finally {
            hideLoading();
        }
    }

    function showSection(section) {
        // Hide all sections
        document.querySelectorAll('.section-content').forEach(el => {
            el.classList.add('hidden');
        });

        // Remove active class from all tabs
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-indigo-600', 'text-white');
            btn.classList.add('text-gray-700', 'hover:bg-gray-100');
        });

        // Show selected section
        document.getElementById(`section-${section}`).classList.remove('hidden');

        // Add active class to selected tab
        const activeTab = document.getElementById(`tab-${section}`);
        activeTab.classList.add('active', 'bg-indigo-600', 'text-white');
        activeTab.classList.remove('text-gray-700', 'hover:bg-gray-100');
    }

    // Hero Backgrounds Management
    let backgrounds = [];

    async function loadBackgrounds() {
        try {
            const response = await fetch('/api/v1/hero-backgrounds');
            const data = await response.json();

            if (data.success) {
                backgrounds = data.data;
                renderBackgrounds();
            }
        } catch (error) {
            console.error('Error loading backgrounds:', error);
        }
    }

    function renderBackgrounds() {
        const grid = document.getElementById('backgrounds-grid');
        const empty = document.getElementById('backgrounds-empty');

        if (backgrounds.length === 0) {
            grid.classList.add('hidden');
            empty.classList.remove('hidden');
            return;
        }

        grid.classList.remove('hidden');
        empty.classList.add('hidden');
        grid.innerHTML = '';

        backgrounds.forEach((bg, index) => {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-xl shadow-lg overflow-hidden border-2 ' + (bg.is_active ? 'border-green-500' : 'border-gray-300');

            card.innerHTML = `
                <div class="relative h-48 bg-gray-200">
                    <img src="${bg.image_url}" alt="Background ${index + 1}" class="w-full h-full object-cover">
                    <div class="absolute top-2 right-2 flex space-x-2">
                        ${bg.is_active ? '<span class="px-2 py-1 bg-green-500 text-white text-xs font-bold rounded-full">Active</span>' : '<span class="px-2 py-1 bg-gray-500 text-white text-xs font-bold rounded-full">Inactive</span>'}
                        <span class="px-2 py-1 bg-indigo-600 text-white text-xs font-bold rounded-full">#${bg.order || index + 1}</span>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-3">
                        <div class="text-sm text-gray-600">
                            <i class="fas fa-magic text-purple-600 mr-1"></i>
                            <span class="font-semibold capitalize">${bg.animation_type}</span>
                        </div>
                        <div class="text-sm text-gray-600">
                            <i class="fas fa-clock text-orange-600 mr-1"></i>
                            <span class="font-semibold">${(bg.animation_duration / 1000)}s</span>
                        </div>
                    </div>
                    <div class="flex justify-between space-x-2">
                        <button onclick="editBackground(${bg.id})" class="flex-1 px-3 py-2 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition font-semibold text-sm">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </button>
                        <button onclick="deleteBackground(${bg.id})" class="flex-1 px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition font-semibold text-sm">
                            <i class="fas fa-trash mr-1"></i>Delete
                        </button>
                    </div>
                </div>
            `;

            grid.appendChild(card);
        });
    }

    function openAddBackgroundModal() {
        document.getElementById('background-modal-title').innerHTML = '<i class="fas fa-plus text-indigo-600 mr-3"></i><span>Add Background Image</span>';
        document.getElementById('backgroundForm').reset();
        document.getElementById('background-id').value = '';
        document.getElementById('bg-preview').classList.add('hidden');
        document.getElementById('backgroundModal').classList.add('active');
    }

    function editBackground(id) {
        const bg = backgrounds.find(b => b.id === id);
        if (!bg) return;

        document.getElementById('background-modal-title').innerHTML = '<i class="fas fa-edit text-indigo-600 mr-3"></i><span>Edit Background Image</span>';
        document.getElementById('background-id').value = bg.id;
        document.getElementById('bg_image_url').value = bg.image_url;
        document.getElementById('bg_animation_type').value = bg.animation_type;
        document.getElementById('bg_animation_duration').value = bg.animation_duration / 1000;
        document.getElementById('bg_is_active').checked = bg.is_active;

        // Show preview
        document.getElementById('bg-preview-img').src = bg.image_url;
        document.getElementById('bg-preview').classList.remove('hidden');

        document.getElementById('backgroundModal').classList.add('active');
    }

    async function handleBackgroundSubmit(event) {
        event.preventDefault();

        const id = document.getElementById('background-id').value;
        const imageSource = document.querySelector('input[name="image_source"]:checked').value;

        let imageUrl = '';

        if (imageSource === 'url') {
            imageUrl = document.getElementById('bg_image_url').value;
            if (!imageUrl || imageUrl.trim() === '') {
                showToast('Please enter an image URL', 'error');
                return;
            }
        } else {
            // Handle file upload
            const fileInput = document.getElementById('bg_image_file');
            if (fileInput.files.length > 0) {
                const formData = new FormData();
                formData.append('image', fileInput.files[0]);

                try {
                    showLoading();
                    const uploadResponse = await fetch('/api/v1/admin/upload-hero-image', {
                        method: 'POST',
                        headers: {
                            'Authorization': `Bearer ${getAuthToken()}`
                        },
                        body: formData
                    });

                    const uploadResult = await uploadResponse.json();
                    if (uploadResult.success) {
                        imageUrl = uploadResult.data.url;
                    } else {
                        throw new Error('Failed to upload image');
                    }
                    hideLoading();
                } catch (error) {
                    hideLoading();
                    showToast('Failed to upload image', 'error');
                    return;
                }
            } else if (!id) {
                showToast('Please select an image', 'error');
                return;
            }
        }

        const data = {
            image_url: imageUrl || document.getElementById('bg_image_url').value,
            image_type: imageSource,
            animation_type: document.getElementById('bg_animation_type').value,
            animation_duration: parseInt(document.getElementById('bg_animation_duration').value) * 1000,
            is_active: document.getElementById('bg_is_active').checked,
            order: backgrounds.length + 1
        };

        try {
            showLoading();
            const url = id ? `/api/v1/admin/hero-backgrounds/${id}` : '/api/v1/admin/hero-backgrounds';
            const method = id ? 'PUT' : 'POST';

            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${getAuthToken()}`
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                showToast(id ? 'Background updated! 🎉' : 'Background added! 🎉', 'success');
                closeBackgroundModal();
                loadBackgrounds();
            } else {
                throw new Error(result.message || 'Failed to save background');
            }
        } catch (error) {
            showToast(error.message || 'Failed to save background', 'error');
        } finally {
            hideLoading();
        }
    }

    async function deleteBackground(id) {
        if (!confirm('Are you sure you want to delete this background image?')) return;

        try {
            showLoading();
            const response = await fetch(`/api/v1/admin/hero-backgrounds/${id}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${getAuthToken()}`
                }
            });

            const result = await response.json();

            if (result.success) {
                showToast('Background deleted! 🗑️', 'success');
                loadBackgrounds();
            } else {
                throw new Error(result.message || 'Failed to delete background');
            }
        } catch (error) {
            showToast(error.message || 'Failed to delete background', 'error');
        } finally {
            hideLoading();
        }
    }

    function closeBackgroundModal() {
        document.getElementById('backgroundModal').classList.remove('active');
    }

    function toggleImageSource() {
        const source = document.querySelector('input[name="image_source"]:checked').value;
        const urlInput = document.getElementById('url-input');
        const fileInput = document.getElementById('file-input');
        const bgImageUrl = document.getElementById('bg_image_url');
        const bgImageFile = document.getElementById('bg_image_file');

        if (source === 'url') {
            urlInput.classList.remove('hidden');
            fileInput.classList.add('hidden');
            bgImageUrl.removeAttribute('disabled');
            bgImageFile.setAttribute('disabled', 'disabled');
        } else {
            urlInput.classList.add('hidden');
            fileInput.classList.remove('hidden');
            bgImageUrl.setAttribute('disabled', 'disabled');
            bgImageFile.removeAttribute('disabled');
        }
    }

    // Image preview
    document.addEventListener('DOMContentLoaded', () => {
        const urlInput = document.getElementById('bg_image_url');
        const fileInput = document.getElementById('bg_image_file');
        const preview = document.getElementById('bg-preview');
        const previewImg = document.getElementById('bg-preview-img');

        if (urlInput) {
            urlInput.addEventListener('input', (e) => {
                if (e.target.value) {
                    previewImg.src = e.target.value;
                    preview.classList.remove('hidden');
                } else {
                    preview.classList.add('hidden');
                }
            });
        }

        if (fileInput) {
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previewImg.src = e.target.result;
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        }
    });

    // Load settings on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadSettings();
        loadBackgrounds();
    });
</script>

<style>
    .tab-btn {
        transition: all 0.3s ease;
    }

    .tab-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 6px rgba(102, 126, 234, 0.3);
    }

    .tab-btn:not(.active) {
        color: #4a5568;
    }

    .tab-btn:not(.active):hover {
        background-color: #f7fafc;
    }
</style>
@endpush
