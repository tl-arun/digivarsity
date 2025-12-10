<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Digivarsity - Transform Your Future')</title>

    <!-- Inter Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Modern Design System CSS -->
    <link rel="stylesheet" href="{{ asset('css/modern-design.css') }}">

    <style>
        /* Tailwind Config Inline */
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        /* Custom Utilities */
        .container-clean {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-spacing {
            padding: 6rem 0;
        }

        @media (max-width: 768px) {
            .container-clean {
                padding: 0 1rem;
            }

            .section-spacing {
                padding: 4rem 0;
            }
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(4px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            border-radius: 1rem;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }

        /* Loader */
        .loader {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #14B8A6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-white text-neutral-900 font-sans antialiased">
    @yield('content')

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-white rounded-lg shadow-xl p-4 max-w-sm border border-neutral-200">
            <div class="flex items-center">
                <div id="toast-icon" class="mr-3"></div>
                <div>
                    <p id="toast-message" class="font-semibold text-neutral-900"></p>
                </div>
                <button onclick="hideToast()" class="ml-4 text-neutral-400 hover:text-neutral-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Global Loading Overlay -->
    <div id="loading-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center backdrop-blur-sm">
        <div class="loader"></div>
    </div>

    <script>
        // API Base URL
        const API_BASE_URL = '/api/v1';

        // Get auth token from localStorage
        function getAuthToken() {
            return localStorage.getItem('auth_token');
        }

        // Set auth token
        function setAuthToken(token) {
            localStorage.setItem('auth_token', token);
        }

        // Remove auth token
        function removeAuthToken() {
            localStorage.removeItem('auth_token');
        }

        // Get user data
        function getUserData() {
            const userData = localStorage.getItem('user_data');
            return userData ? JSON.parse(userData) : null;
        }

        // Set user data
        function setUserData(data) {
            localStorage.setItem('user_data', JSON.stringify(data));
        }

        // Remove user data
        function removeUserData() {
            localStorage.removeItem('user_data');
        }

        // AJAX Request Helper
        async function apiRequest(endpoint, method = 'GET', data = null, requiresAuth = true) {
            const url = `${API_BASE_URL}${endpoint}`;
            const headers = {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            };

            if (requiresAuth) {
                const token = getAuthToken();
                if (token) {
                    headers['Authorization'] = `Bearer ${token}`;
                }
            }

            const options = {
                method: method,
                headers: headers,
            };

            if (data && (method === 'POST' || method === 'PUT' || method === 'PATCH')) {
                options.body = JSON.stringify(data);
            }

            try {
                const response = await fetch(url, options);
                const result = await response.json();

                if (!response.ok) {
                    if (response.status === 401) {
                        removeAuthToken();
                        removeUserData();
                        window.location.href = '/login';
                    }
                    throw new Error(result.message || 'Request failed');
                }

                return result;
            } catch (error) {
                console.error('API Error:', error);
                throw error;
            }
        }

        // Show toast notification
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');
            const toastIcon = document.getElementById('toast-icon');

            toastMessage.textContent = message;

            if (type === 'success') {
                toastIcon.innerHTML = '<svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>';
            } else if (type === 'error') {
                toastIcon.innerHTML = '<svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>';
            } else if (type === 'warning') {
                toastIcon.innerHTML = '<svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>';
            } else {
                toastIcon.innerHTML = '<svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>';
            }

            toast.classList.remove('hidden');

            setTimeout(() => {
                hideToast();
            }, 5000);
        }

        // Hide toast
        function hideToast() {
            document.getElementById('toast').classList.add('hidden');
        }

        // Show loading overlay
        function showLoading() {
            document.getElementById('loading-overlay').classList.remove('hidden');
            document.getElementById('loading-overlay').classList.add('flex');
        }

        // Hide loading overlay
        function hideLoading() {
            document.getElementById('loading-overlay').classList.add('hidden');
            document.getElementById('loading-overlay').classList.remove('flex');
        }

        // Format date
        function formatDate(dateString) {
            if (!dateString) return 'N/A';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            });
        }

        // Format currency
        function formatCurrency(amount) {
            if (!amount) return '₹0';
            return '₹' + parseFloat(amount).toLocaleString('en-IN');
        }

        // Check if user is authenticated
        function isAuthenticated() {
            return !!getAuthToken();
        }

        // Logout function
        async function logout() {
            try {
                showLoading();
                await apiRequest('/auth/logout', 'POST');
                removeAuthToken();
                removeUserData();
                window.location.href = '/login';
            } catch (error) {
                showToast('Logout failed', 'error');
            } finally {
                hideLoading();
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
