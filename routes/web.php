<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\ProgramController;
use App\Http\Controllers\Web\IntentController;
use App\Http\Controllers\Web\OutcomeController;
use App\Http\Controllers\Web\UniversityController;
use App\Http\Controllers\Web\TestimonialController;
use App\Http\Controllers\Web\LeadController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/programs', [HomeController::class, 'programs'])->name('public.programs');
Route::get('/programs/{id}', [HomeController::class, 'programDetail'])->name('public.program.detail');
Route::get('/contact', function() {
    return view('public.contact');
})->name('contact');
Route::get('/career-quiz', function() {
    return view('career-quiz');
})->name('career-quiz');
Route::get('/chatbot', function() {
    return view('chatbot');
})->name('chatbot');

// Demo page for intent selector
Route::get('/intent-demo', function() {
    return view('intent-demo');
})->name('intent-demo');

// Journey pages
Route::get('/journey/learning', function() {
    return view('journeys.learning');
})->name('journey.learning');

Route::get('/journey/career', function() {
    return view('journeys.career');
})->name('journey.career');

Route::get('/journey/professional', function() {
    return view('journeys.professional');
})->name('journey.professional');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Admin routes (protected by JavaScript auth check)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Programs
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs');

    // Intents
    Route::get('/intents', [IntentController::class, 'index'])->name('intents');

    // Outcomes
    Route::get('/outcomes', [OutcomeController::class, 'index'])->name('outcomes');

    // Universities
    Route::get('/universities', [UniversityController::class, 'index'])->name('universities.index');
    Route::get('/universities/create', [UniversityController::class, 'create'])->name('universities.create');
    Route::post('/universities', [UniversityController::class, 'store'])->name('universities.store');
    Route::get('/universities/{university}/edit', [UniversityController::class, 'edit'])->name('universities.edit');
    Route::put('/universities/{university}', [UniversityController::class, 'update'])->name('universities.update');
    Route::delete('/universities/{university}', [UniversityController::class, 'destroy'])->name('universities.destroy');

    // Testimonials
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Leads
    Route::get('/leads', [LeadController::class, 'index'])->name('leads');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users');

    // Home Page Settings
    Route::get('/home-settings', function() {
        return view('admin.home-settings');
    })->name('home-settings');

    // API Test Page
    Route::get('/api-test', function() {
        return view('admin.api-test');
    })->name('api-test');

    // Resume Analyses
    Route::get('/resume-analyses', function() {
        return view('admin.resume-analyses');
    })->name('resume-analyses');
});
