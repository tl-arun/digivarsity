<?php

use App\Http\Controllers\Api\V1\Admin\DashboardController;
use App\Http\Controllers\Api\V1\Admin\IntentController as AdminIntentController;
use App\Http\Controllers\Api\V1\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Api\V1\Admin\OutcomeController as AdminOutcomeController;
use App\Http\Controllers\Api\V1\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Api\V1\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Api\V1\Admin\UniversityController as AdminUniversityController;
use App\Http\Controllers\Api\V1\Admin\UserController as AdminUserController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\IntentController;
use App\Http\Controllers\Api\V1\LeadController;
use App\Http\Controllers\Api\V1\OutcomeController;
use App\Http\Controllers\Api\V1\ProgramController;
use App\Http\Controllers\Api\V1\TestimonialController;
use App\Http\Controllers\Api\V1\UniversityController;
use App\Http\Controllers\ResumeAnalysisController;
use App\Http\Controllers\Api\ChatbotController;
use Illuminate\Support\Facades\Route;

// Public routes - No authentication required
Route::prefix('v1')->group(function () {
    // Auth routes
    Route::post('/auth/login', [AuthController::class, 'login']);

    // Public program routes
    Route::get('/programs', [ProgramController::class, 'index']);
    Route::get('/programs/{id}', [ProgramController::class, 'show']);

    // Home page settings (public read)
    Route::get('/home-settings', function() {
        $settings = \App\Models\HomePageSetting::all();
        $data = [];
        foreach ($settings as $setting) {
            $data[$setting->key] = $setting->value;
        }
        return response()->json(['success' => true, 'data' => $data]);
    });

    // Hero backgrounds (public read)
    Route::get('/hero-backgrounds', function() {
        $backgrounds = \App\Models\HeroBackground::getActiveBackgrounds();
        return response()->json(['success' => true, 'data' => $backgrounds]);
    });

    // Public intent routes
    Route::get('/intents', [IntentController::class, 'index']);
    Route::get('/intents/{id}/programs', [IntentController::class, 'programs']);

    // Public outcome routes
    Route::get('/outcomes', [OutcomeController::class, 'index']);
    Route::get('/outcomes/{id}/programs', [OutcomeController::class, 'programs']);

    // Public university routes
    Route::get('/universities', [UniversityController::class, 'index']);

    // Public testimonial routes
    Route::get('/testimonials', [TestimonialController::class, 'index']);
    Route::get('/programs/{programId}/testimonials', [TestimonialController::class, 'byProgram']);

    // Public lead submission
    Route::post('/leads', [LeadController::class, 'store']);

    // Resume analysis routes (public)
    Route::post('/resume/upload', [ResumeAnalysisController::class, 'upload']);
    Route::post('/resume/{id}/preferences', [ResumeAnalysisController::class, 'updatePreferences']);

    // Chatbot routes (public)
    Route::post('/chatbot/chat', [ChatbotController::class, 'chat']);
});

// Protected routes - Require authentication
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me', [AuthController::class, 'me']);

    // Admin routes - Require admin or counselor role
    Route::prefix('admin')->middleware('role:admin,counselor')->group(function () {
        // Dashboard - admin and counselor
        Route::get('/dashboard', [DashboardController::class, 'index']);

        // Leads - admin and counselor
        Route::get('/leads', [AdminLeadController::class, 'index']);
    });

    // Admin-only routes
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        // Resume analyses
        Route::get('/resume-analyses', function() {
            $analyses = \App\Models\ResumeAnalysis::orderBy('created_at', 'desc')->get();
            return response()->json(['success' => true, 'data' => $analyses]);
        });

        // User management
        Route::post('/users', [AdminUserController::class, 'store']);
        Route::put('/users/{id}', [AdminUserController::class, 'update']);
        Route::post('/users/{id}/assign-role', [AdminUserController::class, 'assignRole']);

        // Program management
        Route::post('/programs', [AdminProgramController::class, 'store']);
        Route::put('/programs/{id}', [AdminProgramController::class, 'update']);
        Route::delete('/programs/{id}', [AdminProgramController::class, 'destroy']);
        Route::post('/programs/{id}/map-intents', [AdminProgramController::class, 'mapIntents']);
        Route::post('/programs/{id}/map-outcomes', [AdminProgramController::class, 'mapOutcomes']);

        // Intent management
        Route::post('/intents', [AdminIntentController::class, 'store']);
        Route::put('/intents/{id}', [AdminIntentController::class, 'update']);
        Route::delete('/intents/{id}', [AdminIntentController::class, 'destroy']);

        // Outcome management
        Route::post('/outcomes', [AdminOutcomeController::class, 'store']);
        Route::put('/outcomes/{id}', [AdminOutcomeController::class, 'update']);
        Route::delete('/outcomes/{id}', [AdminOutcomeController::class, 'destroy']);

        // University management
        Route::post('/universities', [AdminUniversityController::class, 'store']);
        Route::put('/universities/{id}', [AdminUniversityController::class, 'update']);
        Route::delete('/universities/{id}', [AdminUniversityController::class, 'destroy']);

        // Testimonial management
        Route::post('/testimonials', [AdminTestimonialController::class, 'store']);
        Route::put('/testimonials/{id}', [AdminTestimonialController::class, 'update']);
        Route::delete('/testimonials/{id}', [AdminTestimonialController::class, 'destroy']);

        // Home page settings management
        Route::post('/home-settings', function(\Illuminate\Http\Request $request) {
            try {
                $data = $request->all();

                foreach ($data as $key => $value) {
                    \App\Models\HomePageSetting::updateOrCreate(
                        ['key' => $key],
                        ['value' => is_bool($value) ? ($value ? 'true' : 'false') : $value]
                    );
                }

                return response()->json(['success' => true, 'message' => 'Settings updated successfully']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
        });

        // Hero backgrounds management
        Route::post('/hero-backgrounds', function(\Illuminate\Http\Request $request) {
            try {
                $background = \App\Models\HeroBackground::create($request->all());
                return response()->json(['success' => true, 'data' => $background]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
        });

        Route::put('/hero-backgrounds/{id}', function(\Illuminate\Http\Request $request, $id) {
            try {
                $background = \App\Models\HeroBackground::findOrFail($id);
                $background->update($request->all());
                return response()->json(['success' => true, 'data' => $background]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
        });

        Route::delete('/hero-backgrounds/{id}', function($id) {
            try {
                $background = \App\Models\HeroBackground::findOrFail($id);
                $background->delete();
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
        });

        // Upload hero image
        Route::post('/upload-hero-image', function(\Illuminate\Http\Request $request) {
            try {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120'
                ]);

                $image = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/hero'), $filename);

                return response()->json([
                    'success' => true,
                    'data' => ['url' => '/uploads/hero/' . $filename]
                ]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
        });
    });
});
