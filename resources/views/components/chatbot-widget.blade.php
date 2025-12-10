<!-- Inline Chatbot Widget -->
<div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-md mx-auto">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                <i class="fas fa-robot text-indigo-600"></i>
            </div>
            <div class="text-white">
                <h3 class="font-semibold">Ask Me Anything</h3>
                <p class="text-xs text-indigo-100">Get instant program recommendations</p>
            </div>
        </div>
    </div>

    <div id="widget-messages" class="h-64 overflow-y-auto p-4 space-y-3 bg-gray-50">
        <div class="flex items-start space-x-2">
            <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                <i class="fas fa-robot text-indigo-600 text-sm"></i>
            </div>
            <div class="bg-white rounded-lg rounded-tl-none shadow-sm p-3 text-sm">
                <p class="text-gray-800">Hi! I can help you find programs. Try asking:</p>
                <ul class="mt-2 space-y-1 text-xs text-gray-600">
                    <li>• "Show MBA programs"</li>
                    <li>• "Affordable options"</li>
                    <li>• "Online courses"</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="p-4 bg-white border-t border-gray-200">
        <form id="widget-form" class="flex space-x-2">
            <input
                type="text"
                id="widget-input"
                placeholder="Ask about programs..."
                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
            >
            <button
                type="submit"
                class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-lg hover:shadow-md transition text-sm"
            >
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
        <div class="mt-2 text-center">
            <a href="{{ route('chatbot') }}" class="text-xs text-indigo-600 hover:text-indigo-700">
                Open full chat <i class="fas fa-external-link-alt ml-1"></i>
            </a>
        </div>
    </div>
</div>

<script>
    (function() {
        const widgetMessages = document.getElementById('widget-messages');
        const widgetForm = document.getElementById('widget-form');
        const widgetInput = document.getElementById('widget-input');

        widgetForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const message = widgetInput.value.trim();

            if (!message) return;

            // Add user message
            addWidgetMessage(message, 'user');
            widgetInput.value = '';

            // Show typing
            const typingId = showWidgetTyping();

            try {
                const response = await fetch('/api/v1/chatbot/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ message })
                });

                const data = await response.json();
                removeWidgetTyping(typingId);

                if (data.success) {
                    let botMessage = data.response;
                    if (data.programs && data.programs.length > 0) {
                        botMessage += `\n\nFound ${data.programs.length} programs. `;
                    }
                    botMessage += '\n\nFor detailed info, open full chat above.';
                    addWidgetMessage(botMessage, 'bot');
                } else {
                    addWidgetMessage('Sorry, something went wrong.', 'bot');
                }
            } catch (error) {
                removeWidgetTyping(typingId);
                addWidgetMessage('Connection error. Please try again.', 'bot');
            }
        });

        function addWidgetMessage(text, type) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex items-start space-x-2 animate-fade-in';

            if (type === 'user') {
                messageDiv.classList.add('justify-end');
                messageDiv.innerHTML = `
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg rounded-tr-none shadow-sm p-3 text-sm max-w-xs">
                        ${escapeHtml(text)}
                    </div>
                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user text-gray-600 text-sm"></i>
                    </div>
                `;
            } else {
                messageDiv.innerHTML = `
                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-robot text-indigo-600 text-sm"></i>
                    </div>
                    <div class="bg-white rounded-lg rounded-tl-none shadow-sm p-3 text-sm max-w-xs">
                        ${escapeHtml(text).replace(/\n/g, '<br>')}
                    </div>
                `;
            }

            widgetMessages.appendChild(messageDiv);
            widgetMessages.scrollTop = widgetMessages.scrollHeight;
        }

        function showWidgetTyping() {
            const typingDiv = document.createElement('div');
            typingDiv.className = 'flex items-start space-x-2';
            typingDiv.id = 'widget-typing-' + Date.now();
            typingDiv.innerHTML = `
                <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-robot text-indigo-600 text-sm"></i>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-3">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    </div>
                </div>
            `;
            widgetMessages.appendChild(typingDiv);
            widgetMessages.scrollTop = widgetMessages.scrollHeight;
            return typingDiv.id;
        }

        function removeWidgetTyping(id) {
            const typing = document.getElementById(id);
            if (typing) typing.remove();
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    })();
</script>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(5px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }

    #widget-messages::-webkit-scrollbar {
        width: 4px;
    }

    #widget-messages::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    #widget-messages::-webkit-scrollbar-thumb {
        background: #c7d2fe;
        border-radius: 2px;
    }
</style>
