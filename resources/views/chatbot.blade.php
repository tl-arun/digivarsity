@extends('layouts.app')

@section('title', 'AI Assistant - Digivarsity')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Digivarsity
                    </a>
                    <span class="text-gray-400">|</span>
                    <h1 class="text-xl font-semibold text-gray-800">AI Assistant</h1>
                </div>
                <a href="/" class="text-gray-600 hover:text-indigo-600 transition">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Chat Container -->
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden" style="height: calc(100vh - 180px);">
            <div class="flex flex-col h-full">
                <!-- Chat Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                            <i class="fas fa-robot text-indigo-600 text-xl"></i>
                        </div>
                        <div class="text-white">
                            <h2 class="font-semibold text-lg">Digivarsity Assistant</h2>
                            <p class="text-sm text-indigo-100">
                                <span class="inline-block w-2 h-2 bg-green-400 rounded-full mr-1"></span>
                                Online - Ready to help
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div id="chat-messages" class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-50">
                    <!-- Welcome Message -->
                    <div class="flex items-start space-x-3 animate-fade-in">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-robot text-indigo-600"></i>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white rounded-2xl rounded-tl-none shadow-sm p-4 max-w-2xl">
                                <p class="text-gray-800">
                                    👋 Hello! I'm your Digivarsity AI assistant. I can help you:
                                </p>
                                <ul class="mt-3 space-y-2 text-gray-700">
                                    <li class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                        Find the perfect program for your goals
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                        Get career guidance and recommendations
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                        Compare programs and universities
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                        Answer questions about fees, duration, and more
                                    </li>
                                </ul>
                                <p class="mt-3 text-gray-600 text-sm">What would you like to know?</p>
                            </div>
                            <p class="text-xs text-gray-400 mt-1 ml-1">Just now</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Suggestions -->
                <div id="quick-suggestions" class="px-6 py-3 bg-white border-t border-gray-100">
                    <div class="flex flex-wrap gap-2">
                        <button onclick="sendQuickMessage('Show me all programs')"
                                class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm hover:bg-indigo-100 transition">
                            Show all programs
                        </button>
                        <button onclick="sendQuickMessage('I want to advance my career')"
                                class="px-4 py-2 bg-purple-50 text-purple-600 rounded-full text-sm hover:bg-purple-100 transition">
                            Career advancement
                        </button>
                        <button onclick="sendQuickMessage('Tell me about MBA programs')"
                                class="px-4 py-2 bg-pink-50 text-pink-600 rounded-full text-sm hover:bg-pink-100 transition">
                            MBA programs
                        </button>
                        <button onclick="sendQuickMessage('Show affordable options')"
                                class="px-4 py-2 bg-green-50 text-green-600 rounded-full text-sm hover:bg-green-100 transition">
                            Affordable options
                        </button>
                    </div>
                </div>

                <!-- Chat Input -->
                <div class="bg-white border-t border-gray-200 p-4">
                    <form id="chat-form" class="flex items-end space-x-3">
                        <div class="flex-1">
                            <textarea
                                id="chat-input"
                                rows="1"
                                placeholder="Ask me anything about programs, careers, universities..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none"
                                style="max-height: 120px;"
                            ></textarea>
                        </div>
                        <button
                            type="submit"
                            id="send-button"
                            class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-xl hover:shadow-lg transition transform hover:scale-105 flex items-center space-x-2"
                        >
                            <span>Send</span>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                    <p class="text-xs text-gray-400 mt-2 text-center">
                        Press Enter to send • Shift+Enter for new line
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }

    #chat-messages::-webkit-scrollbar {
        width: 6px;
    }

    #chat-messages::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    #chat-messages::-webkit-scrollbar-thumb {
        background: #c7d2fe;
        border-radius: 3px;
    }

    #chat-messages::-webkit-scrollbar-thumb:hover {
        background: #a5b4fc;
    }

    #chat-input {
        scrollbar-width: thin;
    }
</style>

@push('scripts')
<script>
    const chatMessages = document.getElementById('chat-messages');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const sendButton = document.getElementById('send-button');
    const quickSuggestions = document.getElementById('quick-suggestions');

    // Auto-resize textarea
    chatInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 120) + 'px';
    });

    // Handle Enter key
    chatInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            chatForm.dispatchEvent(new Event('submit'));
        }
    });

    // Send message
    chatForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const message = chatInput.value.trim();

        if (!message) return;

        // Add user message to chat
        addUserMessage(message);

        // Clear input
        chatInput.value = '';
        chatInput.style.height = 'auto';

        // Disable input while processing
        chatInput.disabled = true;
        sendButton.disabled = true;

        // Show typing indicator
        const typingId = showTypingIndicator();

        try {
            // Send to API
            const response = await fetch('/api/v1/chatbot/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ message })
            });

            const data = await response.json();

            // Remove typing indicator
            removeTypingIndicator(typingId);

            if (data.success) {
                // Add bot response
                addBotMessage(data.response, data.programs, data.suggestions);
            } else {
                addBotMessage('Sorry, I encountered an error. Please try again.');
            }
        } catch (error) {
            console.error('Chat error:', error);
            removeTypingIndicator(typingId);
            addBotMessage('Sorry, I\'m having trouble connecting. Please try again.');
        } finally {
            // Re-enable input
            chatInput.disabled = false;
            sendButton.disabled = false;
            chatInput.focus();
        }
    });

    function addUserMessage(message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start space-x-3 justify-end animate-fade-in';
        messageDiv.innerHTML = `
            <div class="flex-1 flex justify-end">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl rounded-tr-none shadow-sm p-4 max-w-2xl">
                    <p>${escapeHtml(message)}</p>
                </div>
            </div>
            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-user text-gray-600"></i>
            </div>
        `;
        chatMessages.appendChild(messageDiv);
        scrollToBottom();
    }

    function addBotMessage(message, programs = [], suggestions = []) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start space-x-3 animate-fade-in';

        let programsHtml = '';
        if (programs && programs.length > 0) {
            programsHtml = '<div class="mt-4 space-y-3">';
            programs.forEach(program => {
                programsHtml += `
                    <div class="bg-gray-50 rounded-xl p-4 hover:shadow-md transition border border-gray-100">
                        <div class="flex items-start space-x-3">
                            ${program.image ? `
                                <img src="${program.image}" alt="${program.name}"
                                     class="w-16 h-16 rounded-lg object-cover flex-shrink-0">
                            ` : ''}
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-gray-900 mb-1">${program.name}</h4>
                                <p class="text-sm text-gray-600 mb-2">${program.university}</p>
                                <div class="flex flex-wrap gap-2 text-xs">
                                    <span class="bg-indigo-100 text-indigo-700 px-2 py-1 rounded">
                                        <i class="fas fa-clock mr-1"></i>${program.duration}
                                    </span>
                                    <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded">
                                        <i class="fas fa-laptop mr-1"></i>${program.mode}
                                    </span>
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded font-semibold">
                                        <i class="fas fa-rupee-sign mr-1"></i>${program.fees}
                                    </span>
                                </div>
                                <a href="/programs/${program.id}"
                                   class="inline-block mt-2 text-indigo-600 hover:text-indigo-700 text-sm font-medium">
                                    View Details <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                `;
            });
            programsHtml += '</div>';
        }

        messageDiv.innerHTML = `
            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-robot text-indigo-600"></i>
            </div>
            <div class="flex-1">
                <div class="bg-white rounded-2xl rounded-tl-none shadow-sm p-4 max-w-2xl">
                    <p class="text-gray-800 whitespace-pre-line">${escapeHtml(message)}</p>
                    ${programsHtml}
                </div>
                <p class="text-xs text-gray-400 mt-1 ml-1">Just now</p>
            </div>
        `;

        chatMessages.appendChild(messageDiv);

        // Update suggestions
        if (suggestions && suggestions.length > 0) {
            updateSuggestions(suggestions);
        }

        scrollToBottom();
    }

    function showTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.className = 'flex items-start space-x-3 animate-fade-in';
        typingDiv.id = 'typing-indicator-' + Date.now();
        typingDiv.innerHTML = `
            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-robot text-indigo-600"></i>
            </div>
            <div class="bg-white rounded-2xl rounded-tl-none shadow-sm p-4">
                <div class="flex space-x-2">
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                    <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                </div>
            </div>
        `;
        chatMessages.appendChild(typingDiv);
        scrollToBottom();
        return typingDiv.id;
    }

    function removeTypingIndicator(id) {
        const indicator = document.getElementById(id);
        if (indicator) {
            indicator.remove();
        }
    }

    function updateSuggestions(suggestions) {
        quickSuggestions.innerHTML = '<div class="flex flex-wrap gap-2">';
        suggestions.forEach(suggestion => {
            const button = document.createElement('button');
            button.onclick = () => sendQuickMessage(suggestion);
            button.className = 'px-4 py-2 bg-indigo-50 text-indigo-600 rounded-full text-sm hover:bg-indigo-100 transition';
            button.textContent = suggestion;
            quickSuggestions.firstChild.appendChild(button);
        });
        quickSuggestions.innerHTML += '</div>';
    }

    function sendQuickMessage(message) {
        chatInput.value = message;
        chatForm.dispatchEvent(new Event('submit'));
    }

    function scrollToBottom() {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Focus input on load
    chatInput.focus();
</script>
@endpush
@endsection
