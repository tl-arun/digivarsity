@extends('layouts.app')

@section('title', 'Contact Us - Digivarsity')

@section('content')
<style>
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
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .animate-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .contact-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .contact-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.08);
        border-color: rgba(33, 150, 243, 0.3);
    }

    .hero-contact {
        background: linear-gradient(135deg, #000000 0%, #0D47A1 50%, #1976D2 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-contact::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(33, 150, 243, 0.3) 0%, transparent 70%);
        top: -250px;
        right: -250px;
        animation: float 8s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
</style>

<!-- Navigation -->
@include('components.navbar')

<!-- Hero Section -->
<section class="hero-contact text-white py-24 lg:py-32 relative">
    <div class="container mx-auto px-6 lg:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center space-x-2 bg-white/10 backdrop-blur-md px-6 py-3 rounded-full mb-8 animate-on-scroll">
                <i class="fas fa-envelope text-blue-400"></i>
                <span class="text-sm font-semibold">We're Here to Help</span>
            </div>

            <!-- Heading -->
            <h1 class="text-5xl lg:text-7xl font-black mb-6 leading-tight animate-on-scroll" style="animation-delay: 0.1s">
                Get in <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-blue-400 to-blue-500">Touch</span>
            </h1>

            <!-- Subheading -->
            <p class="text-xl lg:text-2xl text-gray-200 mb-8 max-w-3xl mx-auto animate-on-scroll" style="animation-delay: 0.2s">
                Have questions about our programs? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
                <!-- Contact Info Cards -->
                <div class="contact-card animate-on-scroll">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Call Us</h3>
                    <p class="text-gray-600 mb-4">Mon-Fri from 9am to 6pm</p>
                    <a href="tel:+911234567890" class="text-blue-600 font-semibold hover:text-blue-700 text-lg">
                        +91 123 456 7890
                    </a>
                </div>

                <div class="contact-card animate-on-scroll" style="animation-delay: 0.1s">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Email Us</h3>
                    <p class="text-gray-600 mb-4">We'll respond within 24 hours</p>
                    <a href="mailto:info@digivarsity.com" class="text-blue-600 font-semibold hover:text-blue-700 text-lg">
                        info@digivarsity.com
                    </a>
                </div>

                <div class="contact-card animate-on-scroll" style="animation-delay: 0.2s">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Visit Us</h3>
                    <p class="text-gray-600 mb-4">Come say hello at our office</p>
                    <p class="text-gray-700 font-semibold">
                        New Delhi, India
                    </p>
                </div>
            </div>

            <!-- Contact Form & Map -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="animate-on-scroll">
                    <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12">
                        <h2 class="text-3xl font-black text-gray-900 mb-2">Send us a Message</h2>
                        <p class="text-gray-600 mb-8">Fill out the form below and we'll get back to you shortly</p>

                        <form id="contactForm" onsubmit="handleContactSubmit(event)" class="space-y-6">
                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="contact_name"
                                    required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                    placeholder="John Doe"
                                >
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="email"
                                    id="contact_email"
                                    required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                    placeholder="john@example.com"
                                >
                            </div>

                            <!-- Phone -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="tel"
                                    id="contact_phone"
                                    required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                    placeholder="+91 98765 43210"
                                >
                            </div>

                            <!-- Subject -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Subject <span class="text-red-500">*</span>
                                </label>
                                <select
                                    id="contact_subject"
                                    required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                >
                                    <option value="">Select a subject</option>
                                    <option value="program-inquiry">Program Inquiry</option>
                                    <option value="admission">Admission Process</option>
                                    <option value="fees">Fees & Payment</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="partnership">Partnership Opportunity</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Message <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    id="contact_message"
                                    required
                                    rows="5"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none transition-all"
                                    placeholder="Tell us more about your inquiry..."
                                ></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-full transition-all transform hover:scale-105 hover:shadow-xl flex items-center justify-center space-x-2"
                            >
                                <i class="fas fa-paper-plane"></i>
                                <span>Send Message</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Additional Info & Social -->
                <div class="space-y-8 animate-on-scroll" style="animation-delay: 0.1s">
                    <!-- Office Hours -->
                    <div class="bg-white rounded-3xl shadow-xl p-8">
                        <h3 class="text-2xl font-black text-gray-900 mb-6 flex items-center">
                            <i class="fas fa-clock text-blue-600 mr-3"></i>
                            Office Hours
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="font-semibold text-gray-700">Monday - Friday</span>
                                <span class="text-gray-600">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="font-semibold text-gray-700">Saturday</span>
                                <span class="text-gray-600">10:00 AM - 4:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center py-3">
                                <span class="font-semibold text-gray-700">Sunday</span>
                                <span class="text-red-500 font-semibold">Closed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl shadow-xl p-8 text-white">
                        <h3 class="text-2xl font-black mb-4">Follow Us</h3>
                        <p class="mb-6 opacity-90">Stay connected on social media</p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                                <i class="fab fa-linkedin-in text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all transform hover:scale-110">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="bg-white rounded-3xl shadow-xl p-8">
                        <h3 class="text-2xl font-black text-gray-900 mb-6">Quick Links</h3>
                        <div class="space-y-3">
                            <a href="/programs" class="flex items-center text-gray-700 hover:text-blue-600 transition-colors py-2">
                                <i class="fas fa-chevron-right text-blue-600 mr-3"></i>
                                Browse Programs
                            </a>
                            <a href="/#universities" class="flex items-center text-gray-700 hover:text-blue-600 transition-colors py-2">
                                <i class="fas fa-chevron-right text-blue-600 mr-3"></i>
                                Partner Universities
                            </a>
                            <a href="/#testimonials" class="flex items-center text-gray-700 hover:text-blue-600 transition-colors py-2">
                                <i class="fas fa-chevron-right text-blue-600 mr-3"></i>
                                Success Stories
                            </a>
                            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 transition-colors py-2">
                                <i class="fas fa-chevron-right text-blue-600 mr-3"></i>
                                FAQs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-black text-gray-900 mb-4">Find Us on Map</h2>
                <p class="text-xl text-gray-600">Visit our office or reach out online</p>
            </div>
            <div class="rounded-3xl overflow-hidden shadow-2xl h-96 bg-gray-200 flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-6xl text-blue-600 mb-4"></i>
                    <p class="text-gray-600 text-lg">Map integration coming soon</p>
                    <p class="text-gray-500 mt-2">New Delhi, India</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.footer')
@endsection

@push('scripts')
<script>
    // Scroll Animation Observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });

    // Handle Contact Form Submission
    async function handleContactSubmit(event) {
        event.preventDefault();

        const data = {
            name: document.getElementById('contact_name').value,
            email: document.getElementById('contact_email').value,
            phone: document.getElementById('contact_phone').value,
            subject: document.getElementById('contact_subject').value,
            message: document.getElementById('contact_message').value,
        };

        try {
            showLoading();
            const response = await apiRequest('/leads', 'POST', data, false);

            if (response.success) {
                showToast('Thank you! Your message has been sent successfully. We\'ll get back to you soon.', 'success');
                document.getElementById('contactForm').reset();
            }
        } catch (error) {
            showToast(error.message || 'Failed to send message. Please try again.', 'error');
        } finally {
            hideLoading();
        }
    }
</script>
@endpush
