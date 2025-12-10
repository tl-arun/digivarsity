<!-- Floating Chat Button -->
<div class="fixed bottom-6 right-6 z-40">
    <button onclick="openChatbot()"
       class="group flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 text-white rounded-full shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:scale-110">
        <i class="fas fa-comments text-2xl group-hover:scale-110 transition-transform"></i>
        <span class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white animate-pulse"></span>
    </button>
    <div class="absolute bottom-20 right-0 bg-white rounded-xl shadow-2xl p-4 w-64 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none border border-gray-100">
        <p class="text-sm font-bold text-gray-800 flex items-center mb-1">
            <i class="fas fa-headset text-blue-500 mr-2"></i>
            Need Help?
        </p>
        <p class="text-xs text-gray-600">Chat with our program assistant</p>
    </div>
</div>

<style>
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
