<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intent Selector Demo - Digivarsity</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        .intent-card {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .intent-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .intent-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .intent-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Simple Navigation -->
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-black text-indigo-600">Digivarsity</div>
                <div class="flex items-center space-x-6">
                    <a href="/" class="text-gray-600 hover:text-indigo-600">Home</a>
                    <a href="/programs" class="text-gray-600 hover:text-indigo-600">Programs</a>
                    <a href="/about" class="text-gray-600 hover:text-indigo-600">About</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Intent Selector Component -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-on-scroll">
                <p class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">YOUR FUTURE STARTS HERE</p>
                <h2 class="text-4xl lg:text-6xl font-black mb-6 leading-tight text-gray-900">
                    What future <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">are you ready</span><br/>
                    to build today?
                </h2>
            </div>

            <!-- Intent Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-7xl mx-auto">
                <!-- Card 1: Start My Learning Journey -->
                <div class="intent-card group cursor-pointer" data-intent="learning">
                    <div class="relative h-full bg-white rounded-2xl p-8 transition-all duration-300 border-2 border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-blue-600">
                        <!-- Blue Gradient Overlay (shows on hover) -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <!-- Content -->
                        <div class="relative z-10 min-h-[200px] flex flex-col">
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-2xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">
                                    Start My Learning<br/>Journey
                                </h3>
                                <div class="opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:translate-x-1">
                                    <i class="fas fa-arrow-right text-white text-2xl"></i>
                                </div>
                            </div>
                            <p class="text-gray-600 group-hover:text-white/90 transition-colors duration-300 text-base">
                                Card content goes here
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Build My Career While Studying -->
                <div class="intent-card group cursor-pointer" data-intent="career">
                    <div class="relative h-full bg-white rounded-2xl p-8 transition-all duration-300 border-2 border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-blue-600">
                        <!-- Blue Gradient Overlay (shows on hover) -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <!-- Content -->
                        <div class="relative z-10 min-h-[200px] flex flex-col">
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-2xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">
                                    Build My Career<br/>While Studying
                                </h3>
                                <div class="opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:translate-x-1">
                                    <i class="fas fa-arrow-right text-white text-2xl"></i>
                                </div>
                            </div>
                            <p class="text-gray-600 group-hover:text-white/90 transition-colors duration-300 text-base">
                                Card content goes here
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Level Up Your Professional Skills -->
                <div class="intent-card group cursor-pointer" data-intent="professional">
                    <div class="relative h-full bg-white rounded-2xl p-8 transition-all duration-300 border-2 border-gray-200 shadow-sm hover:shadow-xl hover:-translate-y-2 hover:border-blue-600">
                        <!-- Blue Gradient Overlay (shows on hover) -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <!-- Content -->
                        <div class="relative z-10 min-h-[200px] flex flex-col">
                            <div class="flex items-start justify-between mb-4">
                                <h3 class="text-2xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">
                                    Level Up Your<br/>Professional Skills
                                </h3>
                                <div class="opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:translate-x-1">
                                    <i class="fas fa-arrow-right text-white text-2xl"></i>
                                </div>
                            </div>
                            <p class="text-gray-600 group-hover:text-white/90 transition-colors duration-300 text-base">
                                Card content goes here
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-white rounded-lg shadow-2xl p-4 max-w-sm border-l-4 border-blue-600">
            <div class="flex items-center">
                <div id="toast-icon" class="mr-3">
                    <i class="fas fa-check-circle text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <p id="toast-message" class="font-semibold text-gray-900"></p>
                </div>
                <button onclick="hideToast()" class="ml-4 text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const intentCards = document.querySelectorAll('.intent-card');

            intentCards.forEach(card => {
                card.addEventListener('click', function() {
                    const intent = this.getAttribute('data-intent');
                    handleIntentSelection(intent);
                });
            });
        });

        function handleIntentSelection(intent) {
            console.log('Selected intent:', intent);

            // Show toast notification
            const intentNames = {
                'learning': 'Start My Learning Journey',
                'career': 'Build My Career While Studying',
                'professional': 'Level Up Your Professional Skills'
            };

            showToast(`You selected: ${intentNames[intent]}`);

            // In production, navigate to programs page with intent filter
            // window.location.href = `/programs?intent=${intent}`;
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toast-message');

            toastMessage.textContent = message;
            toast.classList.remove('hidden');

            setTimeout(() => {
                hideToast();
            }, 3000);
        }

        function hideToast() {
            document.getElementById('toast').classList.add('hidden');
        }
    </script>

</body>
</html>
