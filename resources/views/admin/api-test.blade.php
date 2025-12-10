@extends('layouts.admin')

@section('page-title', 'API Test')

@section('admin-content')
<div class="bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold mb-6">API Connection Test</h2>

    <div class="space-y-4">
        <div>
            <button onclick="testIntents()" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                Test Intents API
            </button>
            <div id="intents-result" class="mt-2 p-4 bg-gray-50 rounded hidden"></div>
        </div>

        <div>
            <button onclick="testOutcomes()" class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                Test Outcomes API
            </button>
            <div id="outcomes-result" class="mt-2 p-4 bg-gray-50 rounded hidden"></div>
        </div>

        <div>
            <button onclick="testPrograms()" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">
                Test Programs API
            </button>
            <div id="programs-result" class="mt-2 p-4 bg-gray-50 rounded hidden"></div>
        </div>
    </div>

    <div class="mt-8 p-4 bg-blue-50 rounded-lg">
        <h3 class="font-bold mb-2">Debug Info:</h3>
        <p><strong>API Base URL:</strong> <span id="api-url"></span></p>
        <p><strong>Auth Token:</strong> <span id="auth-token"></span></p>
        <p><strong>Current URL:</strong> <span id="current-url"></span></p>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Display debug info
    document.getElementById('api-url').textContent = API_BASE_URL;
    document.getElementById('auth-token').textContent = getAuthToken() ? 'Present ✓' : 'Missing ✗';
    document.getElementById('current-url').textContent = window.location.href;

    async function testIntents() {
        const resultDiv = document.getElementById('intents-result');
        resultDiv.classList.remove('hidden');
        resultDiv.innerHTML = '<p class="text-gray-600">Testing...</p>';

        try {
            const response = await apiRequest('/intents', 'GET', null, false);
            resultDiv.innerHTML = `
                <p class="text-green-600 font-bold">✓ SUCCESS</p>
                <pre class="mt-2 text-xs overflow-auto">${JSON.stringify(response, null, 2)}</pre>
            `;
        } catch (error) {
            resultDiv.innerHTML = `
                <p class="text-red-600 font-bold">✗ ERROR</p>
                <p class="mt-2 text-sm">${error.message}</p>
                <pre class="mt-2 text-xs overflow-auto">${JSON.stringify(error, null, 2)}</pre>
            `;
        }
    }

    async function testOutcomes() {
        const resultDiv = document.getElementById('outcomes-result');
        resultDiv.classList.remove('hidden');
        resultDiv.innerHTML = '<p class="text-gray-600">Testing...</p>';

        try {
            const response = await apiRequest('/outcomes', 'GET', null, false);
            resultDiv.innerHTML = `
                <p class="text-green-600 font-bold">✓ SUCCESS</p>
                <pre class="mt-2 text-xs overflow-auto">${JSON.stringify(response, null, 2)}</pre>
            `;
        } catch (error) {
            resultDiv.innerHTML = `
                <p class="text-red-600 font-bold">✗ ERROR</p>
                <p class="mt-2 text-sm">${error.message}</p>
                <pre class="mt-2 text-xs overflow-auto">${JSON.stringify(error, null, 2)}</pre>
            `;
        }
    }

    async function testPrograms() {
        const resultDiv = document.getElementById('programs-result');
        resultDiv.classList.remove('hidden');
        resultDiv.innerHTML = '<p class="text-gray-600">Testing...</p>';

        try {
            const response = await apiRequest('/programs', 'GET', null, false);
            resultDiv.innerHTML = `
                <p class="text-green-600 font-bold">✓ SUCCESS</p>
                <p class="mt-2">Found ${response.data.data.length} programs</p>
                <pre class="mt-2 text-xs overflow-auto max-h-64">${JSON.stringify(response, null, 2)}</pre>
            `;
        } catch (error) {
            resultDiv.innerHTML = `
                <p class="text-red-600 font-bold">✗ ERROR</p>
                <p class="mt-2 text-sm">${error.message}</p>
                <pre class="mt-2 text-xs overflow-auto">${JSON.stringify(error, null, 2)}</pre>
            `;
        }
    }
</script>
@endpush
