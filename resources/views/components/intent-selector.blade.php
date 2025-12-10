<!-- Intent Selector Component -->
<section class="min-h-screen flex items-center py-12 sm:py-16 lg:py-20 relative overflow-hidden">
    <!-- Background Video -->
    <div class="absolute inset-0 w-full h-full">
        <video 
            autoplay 
            muted 
            loop 
            playsinline 
            preload="metadata"
            class="w-full h-full object-cover"
            poster="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1920 1080'%3E%3Cdefs%3E%3ClinearGradient id='grad' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' style='stop-color:%23f8fafc;stop-opacity:1' /%3E%3Cstop offset='100%25' style='stop-color:%23e2e8f0;stop-opacity:1' /%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='100%25' height='100%25' fill='url(%23grad)' /%3E%3C/svg%3E"
        >
            <source src="https://d28y8cu0ilslnd.cloudfront.net/wp-content/uploads/2025/06/HeroBanner-New.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- Video Overlay for better text readability -->
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <!-- Gradient overlay for better contrast -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/25 via-black/15 to-black/35"></div>
    </div>
    
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <!-- Section Header -->
        <div class="text-center mb-8 sm:mb-12 lg:mb-16 animate-on-scroll">
            <p class="text-xs sm:text-sm font-semibold text-blue-300 uppercase tracking-wider mb-2 sm:mb-4 drop-shadow-sm">YOUR FUTURE STARTS HERE</p>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black mb-4 sm:mb-6 leading-tight text-white drop-shadow-lg">
                What future <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-cyan-300">are you ready</span><br/>
                to build today?
            </h2>
        </div>

        <!-- Intent Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-4 lg:gap-6 max-w-4xl mx-auto">
            <!-- Card 1: Start My Learning Journey -->
            <div class="intent-card group cursor-pointer" data-intent="learning">
                <div class="relative h-full bg-white/70 backdrop-blur-md rounded-xl sm:rounded-2xl p-3 sm:p-4 lg:p-5 transition-all duration-500 border border-white/30 shadow-2xl hover:shadow-3xl hover:-translate-y-2 sm:hover:-translate-y-3 hover:bg-white/85 min-h-[160px] sm:min-h-[180px] lg:min-h-[200px] flex flex-col">
                    <!-- Icon -->
                    <div class="mb-2 sm:mb-3">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg sm:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-graduation-cap text-white text-base sm:text-lg lg:text-xl"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-900 mb-1 sm:mb-2 leading-tight drop-shadow-sm">
                            Start My Learning<br/>Journey
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-800 leading-relaxed mb-2 sm:mb-3 flex-1 drop-shadow-sm">
                            Begin your educational journey with programs designed for fresh starts and new beginnings
                        </p>
                        
                        <!-- CTA -->
                        <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700 transition-colors text-xs sm:text-sm">
                            <span class="mr-1 sm:mr-2">Get Started</span>
                            <i class="fas fa-arrow-right transform group-hover:translate-x-2 transition-transform text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Build My Career While Studying -->
            <div class="intent-card group cursor-pointer" data-intent="career">
                <div class="relative h-full bg-white/70 backdrop-blur-md rounded-xl sm:rounded-2xl p-3 sm:p-4 lg:p-5 transition-all duration-500 border border-white/30 shadow-2xl hover:shadow-3xl hover:-translate-y-2 sm:hover:-translate-y-3 hover:bg-white/85 min-h-[160px] sm:min-h-[180px] lg:min-h-[200px] flex flex-col">
                    <!-- Icon -->
                    <div class="mb-2 sm:mb-3">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-lg sm:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-briefcase text-white text-base sm:text-lg lg:text-xl"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-900 mb-1 sm:mb-2 leading-tight drop-shadow-sm">
                            Build My Career<br/>While Studying
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-800 leading-relaxed mb-2 sm:mb-3 flex-1 drop-shadow-sm">
                            Balance work and education with flexible programs that fit your schedule
                        </p>
                        
                        <!-- CTA -->
                        <div class="flex items-center text-cyan-600 font-semibold group-hover:text-cyan-700 transition-colors text-xs sm:text-sm">
                            <span class="mr-1 sm:mr-2">Explore Options</span>
                            <i class="fas fa-arrow-right transform group-hover:translate-x-2 transition-transform text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Level Up Your Professional Skills -->
            <div class="intent-card group cursor-pointer" data-intent="professional">
                <div class="relative h-full bg-white/70 backdrop-blur-md rounded-xl sm:rounded-2xl p-3 sm:p-4 lg:p-5 transition-all duration-500 border border-white/30 shadow-2xl hover:shadow-3xl hover:-translate-y-2 sm:hover:-translate-y-3 hover:bg-white/85 min-h-[160px] sm:min-h-[180px] lg:min-h-[200px] flex flex-col">
                    <!-- Icon -->
                    <div class="mb-2 sm:mb-3">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg sm:rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-chart-line text-white text-base sm:text-lg lg:text-xl"></i>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-base sm:text-lg lg:text-xl font-bold text-gray-900 mb-1 sm:mb-2 leading-tight drop-shadow-sm">
                            Level Up Your<br/>Professional Skills
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-800 leading-relaxed mb-2 sm:mb-3 flex-1 drop-shadow-sm">
                            Advance your career with specialized programs for working professionals
                        </p>
                        
                        <!-- CTA -->
                        <div class="flex items-center text-indigo-600 font-semibold group-hover:text-indigo-700 transition-colors text-xs sm:text-sm">
                            <span class="mr-1 sm:mr-2">Level Up</span>
                            <i class="fas fa-arrow-right transform group-hover:translate-x-2 transition-transform text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Video Background Styling */
    section video {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        transform: translateX(-50%) translateY(-50%);
        z-index: 1;
    }

    /* Video loading state */
    section video {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    section video.loaded {
        opacity: 1;
    }

    /* Responsive video adjustments */
    @media (max-width: 768px) {
        section video {
            object-position: center center;
        }
    }

    /* Disable video on very small screens for performance */
    @media (max-width: 480px) {
        section video {
            display: none !important;
        }
    }

    /* Ensure video covers full area on all screen sizes */
    @media (max-aspect-ratio: 16/9) {
        section video {
            width: 100%;
            height: auto;
        }
    }

    @media (min-aspect-ratio: 16/9) {
        section video {
            width: auto;
            height: 100%;
        }
    }

    /* Enhanced Card Styling */
    .intent-card {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
    }

    .intent-card:nth-child(1) {
        animation-delay: 0.2s;
    }

    .intent-card:nth-child(2) {
        animation-delay: 0.4s;
    }

    .intent-card:nth-child(3) {
        animation-delay: 0.6s;
    }

    /* Custom shadow effects */
    .shadow-3xl {
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
    }

    /* Enhanced Glass morphism effect */
    .intent-card > div {
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: 
            0 8px 32px 0 rgba(31, 38, 135, 0.37),
            inset 0 1px 0 0 rgba(255, 255, 255, 0.5);
    }

    /* Enhanced hover glow effect */
    .intent-card:hover > div {
        box-shadow: 
            0 8px 32px 0 rgba(31, 38, 135, 0.5),
            0 0 0 1px rgba(255, 255, 255, 0.4),
            0 0 40px rgba(59, 130, 246, 0.2),
            inset 0 1px 0 0 rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
    }

    /* Icon hover effects */
    .intent-card:hover .w-16 {
        transform: scale(1.1) rotate(5deg);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        section {
            min-height: 100vh;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        
        .intent-card > div {
            min-height: 160px;
            padding: 0.75rem;
        }
        
        .intent-card .w-10 {
            width: 2.25rem;
            height: 2.25rem;
        }
        
        .intent-card h3 {
            font-size: 1rem;
            line-height: 1.3;
        }

        .intent-card p {
            font-size: 0.8rem;
            line-height: 1.4;
        }

        /* Reduce gap on mobile */
        .grid {
            gap: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        section {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        
        .intent-card > div {
            min-height: 140px;
            padding: 0.5rem;
        }
        
        .intent-card h3 {
            font-size: 0.9rem;
            margin-bottom: 0.25rem;
        }

        .intent-card p {
            font-size: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .grid {
            gap: 0.5rem;
        }
    }

    /* Landscape mobile optimization */
    @media (max-height: 600px) and (orientation: landscape) {
        section {
            min-height: auto;
            padding: 1rem 0;
        }
        
        .text-center h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .text-center p {
            margin-bottom: 0.5rem;
        }
        
        .intent-card > div {
            min-height: 160px;
            padding: 0.75rem;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Enhanced text shadows for better readability on transparent background */
    .drop-shadow-lg {
        filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1));
    }

    .drop-shadow-sm {
        filter: drop-shadow(0 2px 4px rgb(0 0 0 / 0.1)) drop-shadow(0 1px 2px rgb(0 0 0 / 0.06));
    }

    /* Enhanced text contrast for transparent cards */
    .intent-card h3,
    .intent-card p {
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* Ensure icons remain vibrant */
    .intent-card .bg-gradient-to-br {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Enhanced gradient backgrounds for icons */
    .bg-gradient-to-br {
        background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
    }

    /* Smooth transitions for all interactive elements */
    .intent-card * {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Subtle animation for the entire section */
    section {
        animation: sectionFadeIn 1s ease-out;
    }

    @keyframes sectionFadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Viewport height optimization */
    @media (max-height: 700px) {
        section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .text-center h2 {
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            margin-bottom: 0.75rem;
        }
        
        .intent-card > div {
            min-height: 140px;
        }
    }

    /* Ultra compact for very small screens */
    @media (max-height: 500px) {
        section {
            padding: 0.25rem 0;
        }
        
        .text-center {
            margin-bottom: 0.75rem;
        }
        
        .text-center h2 {
            font-size: 1.125rem;
            margin-bottom: 0.25rem;
        }
        
        .intent-card > div {
            min-height: 120px;
            padding: 0.375rem;
        }
        
        .grid {
            gap: 0.375rem;
        }
    }
</style>

<script>
    // Video Background Handler for Intent Selector
    function initializeIntentVideoBackground() {
        const video = document.querySelector('section video');
        if (video) {
            // Intersection Observer for performance
            const videoObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Load and play video when in view
                        if (video.readyState === 0) {
                            video.load();
                        }
                        video.play().catch(function(error) {
                            console.log('Video autoplay failed:', error);
                        });
                    } else {
                        // Pause video when out of view to save resources
                        video.pause();
                    }
                });
            }, { threshold: 0.1 });

            videoObserver.observe(video);

            // Handle video loading
            video.addEventListener('loadeddata', function() {
                video.classList.add('loaded');
            });

            // Handle video errors
            video.addEventListener('error', function() {
                console.log('Video failed to load, using fallback background');
                video.style.display = 'none';
            });

            // Optimize for mobile - reduce quality/disable on slow connections
            if (window.innerWidth <= 768 || (navigator.connection && navigator.connection.effectiveType === '2g')) {
                video.style.display = 'none';
                console.log('Video disabled for mobile/slow connection');
            } else {
                video.setAttribute('preload', 'metadata');
            }

            // Respect user's motion preferences
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                video.style.display = 'none';
                console.log('Video disabled due to reduced motion preference');
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize video background
        initializeIntentVideoBackground();
        
        // Initialize intent cards
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
        // Navigate to dedicated journey page
        window.location.href = `/journey/${intent}`;
    }
</script>
