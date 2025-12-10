@extends('layouts.app')

@section('title', 'Login - Digivarsity')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 to-purple-700">
    <div class="bg-white rounded-lg shadow-2xl p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Digivarsity</h1>
            <p class="text-gray-600 mt-2">Admin Login</p>
        </div>

        <form id="loginForm" onsubmit="handleLogin(event)">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email Address
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="admin@digivarsity.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                >
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    value="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-200"
            >
                Login
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Default credentials:<br>
                <span class="font-semibold">admin@digivarsity.com / password</span>
            </p>
        </div>
    </div>
</div>

<script>
    async function handleLogin(event) {
        event.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        try {
            showLoading();

            const response = await apiRequest('/auth/login', 'POST', {
                email: email,
                password: password
            }, false);

            if (response.success) {
                setAuthToken(response.data.token);
                setUserData(response.data.user);
                showToast('Login successful!', 'success');

                setTimeout(() => {
                    window.location.href = '/admin/dashboard';
                }, 1000);
            }
        } catch (error) {
            showToast(error.message || 'Login failed. Please check your credentials.', 'error');
        } finally {
            hideLoading();
        }
    }

    // Redirect if already logged in
    if (isAuthenticated()) {
        window.location.href = '/admin/dashboard';
    }
</script>
@endsection
