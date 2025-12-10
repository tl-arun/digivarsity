<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Digivarsity')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Modern loader */
        .loader {
            width: 48px;
            height: 48px;
            border: 3px solid rgba(99, 102, 241, 0.1);
            border-top-color: #6366F1;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Modern modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f8fafc;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Firefox scrollbar */
        * {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f8fafc;
        }

        /* Modal scrollbar prevention */
        body.modal-open {
            overflow: hidden !important;
            padding-right: 0px !important;
        }

        /* Smooth scrollbar transitions */
        html {
            scroll-behavior: smooth;
        }

        /* Hide scrollbar on mobile devices for modals */
        @media (max-width: 768px) {
            .modal-content::-webkit-scrollbar {
                display: none;
            }
            
            .modal-content {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        }

        /* Ensure no horizontal scrollbar appears */
        body, html {
            overflow-x: hidden;
        }

        /* Prevent scrollbar flicker */
        * {
            box-sizing: border-box;
        }
    </style>
</head>
<body class="bg-neutral-50 text-neutral-900 antialiased">
    @yield('content')

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 z-[9997] hidden">
        <div class="bg-white rounded-lg shadow-lg p-4 max-w-sm">
            <div class="flex items-center">
                <div id="toast-icon" class="mr-3"></div>
                <div>
                    <p id="toast-message" class="font-semibold"></p>
                </div>
                <button onclick="hideToast()" class="ml-4 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Global Loading Overlay -->
    <div id="loading-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-[9998] hidden items-center justify-center">
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
                toastIcon.innerHTML = '<i class="fas fa-check-circle text-green-500 text-2xl"></i>';
            } else if (type === 'error') {
                toastIcon.innerHTML = '<i class="fas fa-exclamation-circle text-red-500 text-2xl"></i>';
            } else if (type === 'warning') {
                toastIcon.innerHTML = '<i class="fas fa-exclamation-triangle text-yellow-500 text-2xl"></i>';
            } else {
                toastIcon.innerHTML = '<i class="fas fa-info-circle text-blue-500 text-2xl"></i>';
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

        // Get scrollbar width to prevent layout shift
        function getScrollbarWidth() {
            const outer = document.createElement('div');
            outer.style.visibility = 'hidden';
            outer.style.overflow = 'scroll';
            outer.style.msOverflowStyle = 'scrollbar';
            document.body.appendChild(outer);

            const inner = document.createElement('div');
            outer.appendChild(inner);

            const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);
            outer.parentNode.removeChild(outer);

            return scrollbarWidth;
        }

        // Prevent body scroll with proper scrollbar handling
        function preventBodyScroll() {
            const scrollbarWidth = getScrollbarWidth();
            document.body.style.overflow = 'hidden';
            document.body.style.paddingRight = scrollbarWidth + 'px';
        }

        // Restore body scroll
        function restoreBodyScroll() {
            document.body.style.overflow = '';
            document.body.style.paddingRight = '';
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
