<!-- Chat Assistant Modal -->
<div id="chatbot-modal" class="fixed inset-0 z-[9999] hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm" onclick="closeChatbot()"></div>

    <!-- Modal Container -->
    <div class="absolute inset-0 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="modal-content bg-white rounded-2xl sm:rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] sm:max-h-[85vh] md:h-[600px] flex flex-col animate-modal-in mx-auto my-auto">
            <!-- Header -->
            <div class="bg-gradient-to-r from-blue-500 via-blue-600 to-cyan-500 px-3 sm:px-4 py-3 rounded-t-2xl sm:rounded-t-3xl flex items-center justify-between">
                <div class="flex items-center space-x-3 flex-1 min-w-0">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 bg-white rounded-full flex items-center justify-center shadow-md flex-shrink-0">
                        <i class="fas fa-headset text-blue-500 text-sm sm:text-base"></i>
                    </div>
                    <div class="text-white min-w-0 flex-1">
                        <h2 class="font-medium text-sm sm:text-base truncate">Program Assistant</h2>
                        <p class="text-xs text-blue-50 flex items-center">
                            <span class="inline-block w-1.5 h-1.5 bg-green-300 rounded-full mr-1.5 animate-pulse flex-shrink-0"></span>
                            <span class="truncate">Online • Ready to help</span>
                        </p>
                    </div>
                </div>
                <button onclick="closeChatbot()" class="text-white hover:bg-white hover:bg-opacity-20 rounded-full p-1.5 transition flex-shrink-0">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <!-- Chat Messages -->
            <div id="modal-chat-messages" class="flex-1 overflow-y-auto p-3 sm:p-4 space-y-3 bg-gradient-to-b from-gray-50 to-white">
                <!-- Welcome Message -->
                <div class="flex items-start space-x-2.5 animate-fade-in">
                    <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">
                        <i class="fas fa-user-tie text-white text-xs"></i>
                    </div>
                    <div class="flex-1">
                        <div class="bg-white rounded-xl rounded-tl-none shadow-sm p-4 max-w-2xl border border-gray-100">
                            <p class="text-gray-800 font-medium text-sm mb-2">
                                👋 Hello! Welcome to Digivarsity!
                            </p>
                            <p class="text-gray-700 text-sm mb-3">
                                I'm here to help you find the perfect educational program. I can assist you with:
                            </p>
                            <ul class="space-y-1.5 text-gray-700 text-sm">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5 text-xs"></i>
                                    <span>Finding programs that match your career goals</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5 text-xs"></i>
                                    <span>Answering questions about courses and universities</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5 text-xs"></i>
                                    <span>Providing information about fees, duration, and eligibility</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5 text-xs"></i>
                                    <span>Helping you make an informed decision</span>
                                </li>
                            </ul>
                            <p class="mt-3 text-gray-600 text-xs font-medium">
                                What would you like to know today?
                            </p>
                        </div>
                        <p class="text-xs text-gray-400 mt-1.5 ml-1">Just now</p>
                    </div>
                </div>
            </div>

            <!-- Quick Suggestions -->
            <div id="modal-quick-suggestions" class="px-3 sm:px-4 py-2.5 bg-white border-t border-gray-200">
                <p class="text-xs text-gray-500 mb-1.5 font-medium hidden sm:block">Quick options:</p>
                <div class="flex flex-wrap gap-1.5">
                    <button onclick="sendModalQuickMessage('Show me all programs')"
                            class="px-3 py-1.5 bg-blue-50 text-blue-600 rounded-full text-xs font-medium hover:bg-blue-100 transition">
                        <i class="fas fa-graduation-cap mr-1"></i> All Programs
                    </button>
                    <button onclick="sendModalQuickMessage('I want to advance my career')"
                            class="px-3 py-1.5 bg-green-50 text-green-600 rounded-full text-xs font-medium hover:bg-green-100 transition">
                        <i class="fas fa-briefcase mr-1"></i> Career Growth
                    </button>
                    <button onclick="sendModalQuickMessage('Tell me about MBA programs')"
                            class="px-3 py-1.5 bg-purple-50 text-purple-600 rounded-full text-xs font-medium hover:bg-purple-100 transition">
                        <i class="fas fa-chart-line mr-1"></i> MBA Programs
                    </button>
                    <button onclick="sendModalQuickMessage('Show affordable options')"
                            class="px-3 py-1.5 bg-orange-50 text-orange-600 rounded-full text-xs font-medium hover:bg-orange-100 transition">
                        <i class="fas fa-tag mr-1"></i> Budget-Friendly
                    </button>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="bg-white border-t border-gray-200 p-3 rounded-b-3xl">
                <form id="modal-chat-form" class="flex items-end space-x-2.5">
                    <div class="flex-1">
                        <textarea
                            id="modal-chat-input"
                            rows="1"
                            placeholder="Type your message here..."
                            class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-400 focus:border-transparent resize-none transition text-sm"
                            style="max-height: 100px;"
                        ></textarea>
                    </div>
                    <button
                        type="submit"
                        id="modal-send-button"
                        class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-5 py-2.5 rounded-xl hover:shadow-md transition transform hover:scale-105 flex items-center space-x-1.5 font-medium text-sm"
                    >
                        <span>Send</span>
                        <i class="fas fa-paper-plane text-xs"></i>
                    </button>
                </form>
                <p class="text-xs text-gray-400 mt-2 text-center flex items-center justify-center">
                    <i class="fas fa-keyboard mr-1.5 text-xs"></i>
                    Press Enter to send • Shift+Enter for new line
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes modal-in {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-modal-in {
        animation: modal-in 0.3s ease-out;
    }

    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }

    #modal-chat-messages::-webkit-scrollbar {
        width: 8px;
    }

    #modal-chat-messages::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    #modal-chat-messages::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #3b82f6, #06b6d4);
        border-radius: 10px;
    }

    #modal-chat-messages::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #2563eb, #0891b2);
    }

    /* Modal Positioning and Responsiveness */
    #chatbot-modal {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }

    #chatbot-modal > div > div {
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #chatbot-modal:not(.hidden) > div > div {
        transform: scale(1);
        opacity: 1;
    }

    /* Responsive Modal Sizing */
    @media (max-width: 640px) {
        #chatbot-modal > div {
            padding: 1rem !important;
        }
        
        #chatbot-modal > div > div {
            max-height: 95vh !important;
            margin: auto;
        }
    }

    @media (max-width: 480px) {
        #chatbot-modal > div {
            padding: 0.5rem !important;
        }
        
        #chatbot-modal > div > div {
            max-height: 98vh !important;
            border-radius: 1rem !important;
        }
    }

    /* Ensure modal content is scrollable on small screens */
    @media (max-height: 600px) {
        #chatbot-modal > div > div {
            max-height: 95vh !important;
        }
    }

    /* Custom Scrollbar Styling for Modal Container */
    #chatbot-modal > div > div::-webkit-scrollbar {
        width: 6px;
    }

    #chatbot-modal > div > div::-webkit-scrollbar-track {
        background: transparent;
    }

    #chatbot-modal > div > div::-webkit-scrollbar-thumb {
        background: rgba(156, 163, 175, 0.5);
        border-radius: 3px;
    }

    #chatbot-modal > div > div::-webkit-scrollbar-thumb:hover {
        background: rgba(156, 163, 175, 0.8);
    }

    /* Hide scrollbar for Firefox */
    #chatbot-modal > div > div {
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
    const modalChatMessages = document.getElementById('modal-chat-messages');
    const modalChatForm = document.getElementById('modal-chat-form');
    const modalChatInput = document.getElementById('modal-chat-input');
    const modalSendButton = document.getElementById('modal-send-button');
    const modalQuickSuggestions = document.getElementById('modal-quick-suggestions');

    // Open chatbot modal
    function openChatbot() {
        const modal = document.getElementById('chatbot-modal');
        modal.classList.remove('hidden');
        
        // Prevent body scroll with proper scrollbar handling
        if (typeof preventBodyScroll === 'function') {
            preventBodyScroll();
        } else {
            document.body.style.overflow = 'hidden';
        }
        
        // Ensure proper centering
        setTimeout(() => {
            const modalContainer = modal.querySelector('div > div');
            if (modalContainer) {
                modalContainer.scrollTop = 0;
            }
            modalChatInput.focus();
        }, 100);
    }

    // Close chatbot modal
    function closeChatbot() {
        document.getElementById('chatbot-modal').classList.add('hidden');
        
        // Restore body scroll with proper scrollbar handling
        if (typeof restoreBodyScroll === 'function') {
            restoreBodyScroll();
        } else {
            document.body.style.overflow = 'auto';
        }
    }

    // Auto-resize textarea
    modalChatInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 120) + 'px';
    });

    // Handle Enter key
    modalChatInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            modalChatForm.dispatchEvent(new Event('submit'));
        }
    });

    // Send message
    modalChatForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const message = modalChatInput.value.trim();

        if (!message) return;

        // Add user message
        addModalUserMessage(message);

        // Clear input
        modalChatInput.value = '';
        modalChatInput.style.height = 'auto';

        // Disable input
        modalChatInput.disabled = true;
        modalSendButton.disabled = true;

        // Show typing indicator
        const typingId = showModalTypingIndicator();

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
            removeModalTypingIndicator(typingId);

            if (data.success) {
                // Add bot response
                addModalBotMessage(data.response, data.programs, data.suggestions);
            } else {
                addModalBotMessage('Sorry, I encountered an error. Please try again.');
            }
        } catch (error) {
            console.error('Chat error:', error);
            removeModalTypingIndicator(typingId);
            addModalBotMessage('Sorry, I\'m having trouble connecting. Please try again.');
        } finally {
            // Re-enable input
            modalChatInput.disabled = false;
            modalSendButton.disabled = false;
            modalChatInput.focus();
        }
    });

    function addModalUserMessage(message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start space-x-3 justify-end animate-fade-in';
        messageDiv.innerHTML = `
            <div class="flex-1 flex justify-end">
                <div class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white rounded-2xl rounded-tr-none shadow-md p-4 max-w-2xl">
                    <p class="leading-relaxed">${escapeHtml(message)}</p>
                </div>
            </div>
            <div class="w-10 h-10 bg-gradient-to-br from-gray-300 to-gray-400 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                <i class="fas fa-user text-white text-sm"></i>
            </div>
        `;
        modalChatMessages.appendChild(messageDiv);
        scrollModalToBottom();
    }

    function addModalBotMessage(message, programs = [], suggestions = []) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start space-x-3 animate-fade-in';

        let programsHtml = '';
        if (programs && programs.length > 0) {
            programsHtml = '<div class="mt-4 space-y-3">';
            programs.forEach(program => {
                programsHtml += `
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 hover:shadow-lg transition border border-blue-100">
                        <div class="flex items-start space-x-3">
                            ${program.image ? `
                                <img src="${program.image}" alt="${program.name}"
                                     class="w-16 h-16 rounded-lg object-cover flex-shrink-0 shadow-sm">
                            ` : ''}
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-gray-900 mb-1">${program.name}</h4>
                                <p class="text-sm text-gray-600 mb-3">${program.university}</p>
                                <div class="flex flex-wrap gap-2 text-xs">
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1.5 rounded-full font-medium">
                                        <i class="fas fa-clock mr-1"></i>${program.duration}
                                    </span>
                                    <span class="bg-cyan-100 text-cyan-700 px-3 py-1.5 rounded-full font-medium">
                                        <i class="fas fa-laptop mr-1"></i>${program.mode}
                                    </span>
                                    <span class="bg-green-100 text-green-700 px-3 py-1.5 rounded-full font-bold">
                                        <i class="fas fa-rupee-sign mr-1"></i>${program.fees}
                                    </span>
                                </div>
                                <a href="/programs/${program.id}"
                                   class="inline-block mt-3 text-blue-600 hover:text-blue-700 text-sm font-semibold">
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
            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                <i class="fas fa-user-tie text-white text-sm"></i>
            </div>
            <div class="flex-1">
                <div class="bg-white rounded-2xl rounded-tl-none shadow-md p-4 max-w-2xl border border-gray-100">
                    <p class="text-gray-800 whitespace-pre-line leading-relaxed">${escapeHtml(message)}</p>
                    ${programsHtml}
                </div>
                <p class="text-xs text-gray-400 mt-2 ml-1">Just now</p>
            </div>
        `;

        modalChatMessages.appendChild(messageDiv);

        // Update suggestions
        if (suggestions && suggestions.length > 0) {
            updateModalSuggestions(suggestions);
        }

        scrollModalToBottom();
    }

    function showModalTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.className = 'flex items-start space-x-3 animate-fade-in';
        typingDiv.id = 'modal-typing-indicator-' + Date.now();
        typingDiv.innerHTML = `
            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                <i class="fas fa-user-tie text-white text-sm"></i>
            </div>
            <div class="bg-white rounded-2xl rounded-tl-none shadow-md p-4 border border-gray-100">
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Typing</span>
                    <div class="flex space-x-1 ml-2">
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-cyan-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                </div>
            </div>
        `;
        modalChatMessages.appendChild(typingDiv);
        scrollModalToBottom();
        return typingDiv.id;
    }

    function removeModalTypingIndicator(id) {
        const indicator = document.getElementById(id);
        if (indicator) {
            indicator.remove();
        }
    }

    function updateModalSuggestions(suggestions) {
        const colors = [
            { bg: 'bg-blue-50', text: 'text-blue-600', hover: 'hover:bg-blue-100' },
            { bg: 'bg-green-50', text: 'text-green-600', hover: 'hover:bg-green-100' },
            { bg: 'bg-purple-50', text: 'text-purple-600', hover: 'hover:bg-purple-100' },
            { bg: 'bg-orange-50', text: 'text-orange-600', hover: 'hover:bg-orange-100' }
        ];

        modalQuickSuggestions.innerHTML = '<p class="text-xs text-gray-500 mb-2 font-medium">Quick options:</p><div class="flex flex-wrap gap-2">';
        suggestions.forEach((suggestion, index) => {
            const color = colors[index % colors.length];
            const button = document.createElement('button');
            button.onclick = () => sendModalQuickMessage(suggestion);
            button.className = `px-4 py-2.5 ${color.bg} ${color.text} rounded-full text-sm font-medium ${color.hover} transition shadow-sm`;
            button.textContent = suggestion;
            modalQuickSuggestions.lastChild.appendChild(button);
        });
        modalQuickSuggestions.innerHTML += '</div>';
    }

    function sendModalQuickMessage(message) {
        modalChatInput.value = message;
        modalChatForm.dispatchEvent(new Event('submit'));
    }

    function scrollModalToBottom() {
        modalChatMessages.scrollTop = modalChatMessages.scrollHeight;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeChatbot();
        }
    });
</script>
