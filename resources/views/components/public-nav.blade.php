<!-- Modern Navigation -->
<nav class="bg-white/95 backdrop-blur-md shadow-sm sticky top-0 z-50 border-b border-neutral-200">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 group">
                <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition-transform duration-300">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold gradient-text">Digivarsity</h1>
                    <p class="text-xs text-gray-500 font-medium">Transform Your Future</p>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }} text-gray-900 font-medium hover:text-indigo-600 transition-colors">
                    Home
                </a>
                <a href="/programs" class="nav-link {{ request()->is('programs*') ? 'active' : '' }} text-gray-600 font-medium hover:text-indigo-600 transition-colors">
                    Programs
                </a>
                <a href="/#universities" class="nav-link text-gray-600 font-medium hover:text-indigo-600 transition-colors">
                    Universities
                </a>
                <a href="/chatbot" class="nav-link {{ request()->is('chatbot') ? 'active' : '' }} text-gray-600 font-medium hover:text-indigo-600 transition-colors flex items-center gap-1">
                    <i class="fas fa-robot text-sm"></i>
                    AI Assistant
                </a>
                <a href="/#testimonials" class="nav-link text-gray-600 font-medium hover:text-indigo-600 transition-colors">
                    Success Stories
                </a>
                <a href="/#contact" class="nav-link text-gray-600 font-medium hover:text-indigo-600 transition-colors">
                    Contact
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <a href="/programs" class="modern-btn bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3">
                    <span>Get Started</span>
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button onclick="toggleMobileMenu()" class="lg:hidden text-gray-700 hover:text-indigo-600 transition-colors">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu lg:hidden">
            <div class="py-4 space-y-3">
                <a href="/" class="block px-4 py-3 {{ request()->is('/') ? 'text-indigo-600 font-semibold bg-indigo-50' : 'text-gray-700 font-medium hover:bg-gray-50' }} rounded-xl transition-colors">
                    Home
                </a>
                <a href="/programs" class="block px-4 py-3 {{ request()->is('programs*') ? 'text-indigo-600 font-semibold bg-indigo-50' : 'text-gray-700 font-medium hover:bg-gray-50' }} rounded-xl transition-colors">
                    Programs
                </a>
                <a href="/#universities" onclick="toggleMobileMenu()" class="block px-4 py-3 text-gray-700 font-medium hover:bg-gray-50 rounded-xl transition-colors">
                    Universities
                </a>
                <a href="/chatbot" class="block px-4 py-3 {{ request()->is('chatbot') ? 'text-indigo-600 font-semibold bg-indigo-50' : 'text-gray-700 font-medium hover:bg-gray-50' }} rounded-xl transition-colors">
                    <i class="fas fa-robot mr-2"></i>AI Assistant
                </a>
                <a href="/#testimonials" onclick="toggleMobileMenu()" class="block px-4 py-3 text-gray-700 font-medium hover:bg-gray-50 rounded-xl transition-colors">
                    Success Stories
                </a>
                <a href="/#contact" onclick="toggleMobileMenu()" class="block px-4 py-3 text-gray-700 font-medium hover:bg-gray-50 rounded-xl transition-colors">
                    Contact
                </a>
                <a href="/programs" class="block px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full font-semibold text-center mt-4">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        position: relative;
        padding-bottom: 0.25rem;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #6366F1, #8B5CF6);
        transition: width 0.3s ease;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }

    .mobile-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .mobile-menu.active {
        max-height: 500px;
    }
</style>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('active');
    }
</script>
