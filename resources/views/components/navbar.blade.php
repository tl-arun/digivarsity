<!-- Modern Navigation -->
<nav class="bg-black shadow-lg sticky top-0 z-50 relative">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 group">
                <img src="/images/digivarsity-logo.png" alt="Digivarsity" class="h-12 transform group-hover:scale-105 transition-transform duration-300">
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }} text-white font-medium hover:text-blue-400 transition-colors">
                    Home
                </a>
                <a href="/programs" class="nav-link {{ request()->is('programs*') ? 'active' : '' }} text-white font-medium hover:text-blue-400 transition-colors">
                    Programs
                </a>
                <a href="/#universities" class="nav-link text-white font-medium hover:text-blue-400 transition-colors">
                    Universities
                </a>
                <a href="/#testimonials" class="nav-link text-white font-medium hover:text-blue-400 transition-colors">
                    Success Stories
                </a>
                <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }} text-white font-medium hover:text-blue-400 transition-colors">
                    Contact
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <a href="/programs" class="modern-btn bg-blue-600 hover:bg-blue-700 text-white px-8 py-3">
                    <span>Get Started</span>
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button onclick="toggleMobileMenu()" class="lg:hidden text-white hover:text-blue-400 transition-colors">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu lg:hidden bg-black">
            <div class="py-4 space-y-3">
                <a href="/" class="block px-4 py-3 {{ request()->is('/') ? 'text-blue-400 font-semibold bg-blue-900/30' : 'text-white font-medium hover:bg-blue-900/20' }} rounded-xl transition-colors">
                    Home
                </a>
                <a href="/programs" class="block px-4 py-3 {{ request()->is('programs*') ? 'text-blue-400 font-semibold bg-blue-900/30' : 'text-white font-medium hover:bg-blue-900/20' }} rounded-xl transition-colors">
                    Programs
                </a>
                <a href="/#universities" onclick="toggleMobileMenu()" class="block px-4 py-3 text-white font-medium hover:bg-blue-900/20 rounded-xl transition-colors">
                    Universities
                </a>
                <a href="/#testimonials" onclick="toggleMobileMenu()" class="block px-4 py-3 text-white font-medium hover:bg-blue-900/20 rounded-xl transition-colors">
                    Success Stories
                </a>
                <a href="/contact" class="block px-4 py-3 {{ request()->is('contact') ? 'text-blue-400 font-semibold bg-blue-900/30' : 'text-white font-medium hover:bg-blue-900/20' }} rounded-xl transition-colors">
                    Contact
                </a>
                <a href="/programs" class="block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold text-center mt-4">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</nav>

<style>
    .modern-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        border-radius: 9999px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .modern-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -5px rgba(33, 150, 243, 0.5);
    }

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
        background: #2196F3;
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

    /* Smooth gradient border */
    nav::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            rgba(59, 130, 246, 0.3) 10%, 
            rgba(59, 130, 246, 0.8) 50%, 
            rgba(59, 130, 246, 0.3) 90%, 
            transparent 100%
        );
        opacity: 0.7;
    }

    /* Enhanced gradient with blur effect */
    nav::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 8px;
        background: linear-gradient(180deg, 
            rgba(59, 130, 246, 0.2) 0%, 
            rgba(59, 130, 246, 0.1) 50%, 
            transparent 100%
        );
        filter: blur(2px);
        opacity: 0.6;
    }

    /* Subtle animation for the gradient */
    nav::after {
        animation: gradientPulse 3s ease-in-out infinite alternate;
    }

    @keyframes gradientPulse {
        0% {
            opacity: 0.5;
            transform: scaleX(0.95);
        }
        100% {
            opacity: 0.8;
            transform: scaleX(1);
        }
    }

    /* Mobile responsive gradient */
    @media (max-width: 768px) {
        nav::after {
            height: 2px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(59, 130, 246, 0.4) 20%, 
                rgba(59, 130, 246, 0.7) 50%, 
                rgba(59, 130, 246, 0.4) 80%, 
                transparent 100%
            );
        }

        nav::before {
            height: 6px;
            background: linear-gradient(180deg, 
                rgba(59, 130, 246, 0.15) 0%, 
                rgba(59, 130, 246, 0.08) 50%, 
                transparent 100%
            );
        }
    }

    /* Reduce motion for accessibility */
    @media (prefers-reduced-motion: reduce) {
        nav::after {
            animation: none;
        }
    }
</style>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('active');
    }
</script>
