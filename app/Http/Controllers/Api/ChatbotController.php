<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\University;
use App\Models\Intent;
use App\Models\Outcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'context' => 'nullable|array'
        ]);

        $message = trim($request->message);
        $context = $request->context ?? [];

        // Use PHP-based conversational logic (faster and more reliable)
        $response = $this->generateResponse(strtolower($message), $context);

        return response()->json([
            'success' => true,
            'response' => $response['message'],
            'suggestions' => $response['suggestions'] ?? [],
            'programs' => $response['programs'] ?? [],
            'context' => $response['context'] ?? []
        ]);
    }

    private function analyzeWithPython($message, $context)
    {
        // Get all programs data for AI analysis
        $programs = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true)
            ->get()
            ->map(function ($program) {
                return [
                    'id' => $program->id,
                    'name' => $program->name,
                    'description' => $program->description,
                    'university' => $program->university->name ?? '',
                    'duration' => $program->duration,
                    'mode' => $program->mode,
                    'fees' => $program->fees,
                    'eligibility' => $program->eligibility,
                    'intent' => $program->intent->name ?? '',
                    'outcome' => $program->outcome->name ?? '',
                    'is_featured' => $program->is_featured
                ];
            })->toArray();

        // Prepare data for Python AI script
        $data = [
            'message' => $message,
            'programs' => $programs,
            'context' => $context
        ];

        // Use conversational AI script
        $pythonScript = base_path('scripts/chatbot_ai_openai.py');

        // Fallback to basic AI if conversational not found
        if (!file_exists($pythonScript)) {
            $pythonScript = base_path('scripts/chatbot_ai.py');
        }

        // Check if Python script exists
        if (!file_exists($pythonScript)) {
            throw new \Exception('Python AI script not found');
        }

        // Write data to temporary file to avoid command line escaping issues
        $tempFile = storage_path('app/chatbot_input_' . uniqid() . '.json');
        file_put_contents($tempFile, json_encode($data, JSON_UNESCAPED_UNICODE));

        try {
            // Execute Python AI script with temp file
            $pythonPath = 'C:\\Python312\\python.exe';
            if (!file_exists($pythonPath)) {
                $pythonPath = 'python'; // Fallback to PATH
            }

            $command = "\"{$pythonPath}\" \"{$pythonScript}\" \"{$tempFile}\"";
            $result = Process::run($command);

            // Clean up temp file
            @unlink($tempFile);

            if ($result->failed()) {
                throw new \Exception('Python AI execution failed: ' . $result->errorOutput());
            }

            $output = json_decode($result->output(), true);
        } catch (\Exception $e) {
            // Clean up temp file on error
            @unlink($tempFile);
            throw $e;
        }

        if (!$output) {
            throw new \Exception('Invalid Python AI output');
        }

        // Format programs for response
        if (!empty($output['program_ids'])) {
            $programIds = $output['program_ids'];
            $selectedPrograms = Program::with(['university', 'intent', 'outcome'])
                ->whereIn('id', $programIds)
                ->get()
                ->map(function ($program) {
                    return $this->formatProgram($program);
                });

            $output['programs'] = $selectedPrograms->toArray();
        } else {
            $output['programs'] = [];
        }

        return $output;
    }

    private function generateResponse($message, $context)
    {
        // Check if user explicitly wants to see programs
        $showPrograms = $this->shouldShowPrograms($message);

        if (!$showPrograms) {
            // Return conversational response without programs
            return $this->getConversationalResponse($message);
        }

        // If they want to see programs, show them
        return $this->getProgramDisplayResponse($message);
    }

    private function shouldShowPrograms($message)
    {
        $showPatterns = [
            'show me program', 'show program', 'show all program',
            'list program', 'display program',
            'see program', 'view program',
            'find program', 'search program',
            'give me program', 'recommend program'
        ];

        foreach ($showPatterns as $pattern) {
            if (stripos($message, $pattern) !== false) {
                return true;
            }
        }

        return false;
    }

    private function getConversationalResponse($message)
    {
        // Greeting patterns
        if (preg_match('/^(hi|hello|hey|greetings|good morning|good afternoon|good evening)/i', $message)) {
            return [
                'message' => "Hello! 👋 Welcome to Digivarsity! I'm here to help you find the perfect educational program. Whether you're looking to advance your career, switch fields, or gain new skills, I can guide you through our offerings. What would you like to know?",
                'suggestions' => [
                    'Show me all programs',
                    'I want to advance my career',
                    'Tell me about MBA programs',
                    'What universities do you have?'
                ]
            ];
        }

        // Program search
        if (preg_match('/(show|list|find|search|tell|what|which).*(program|course)/i', $message)) {
            return $this->searchPrograms($message);
        }

        // MBA specific - CONVERSATIONAL (no programs)
        if (preg_match('/mba|master.*business|business.*administration/i', $message)) {
            return [
                'message' => "MBA programs are excellent for career advancement! 🎓\n\n" .
                    "An MBA typically offers:\n" .
                    "• Leadership and management skills\n" .
                    "• Career growth opportunities (30-50% salary increase on average)\n" .
                    "• Strong professional network\n" .
                    "• Versatility across industries\n\n" .
                    "Is MBA right for you? It depends on your career goals, experience, and aspirations.\n\n" .
                    "What specifically would you like to know about MBA programs? Or would you like to see our available MBA programs?",
                'suggestions' => [
                    'Show me MBA programs',
                    'What are the fees?',
                    'Is MBA worth it for my career?',
                    'What are eligibility requirements?'
                ],
                'programs' => []
            ];
        }

        // Career-related queries
        if (preg_match('/(career|job|work|professional|advance|growth|promotion)/i', $message)) {
            return $this->careerGuidance($message);
        }

        // University queries
        if (preg_match('/(university|universities|college|institution)/i', $message)) {
            return $this->universityInfo($message);
        }

        // Duration queries
        if (preg_match('/(\d+)\s*(year|month|week)/i', $message, $matches)) {
            return $this->findByDuration($matches[1], $matches[2]);
        }

        // Budget/fees queries
        if (preg_match('/(cheap|affordable|budget|fee|cost|price|expensive)/i', $message)) {
            return $this->findByBudget($message);
        }

        // Mode queries (online/offline)
        if (preg_match('/(online|offline|distance|campus|hybrid)/i', $message, $matches)) {
            return $this->findByMode($matches[1]);
        }

        // Help/capabilities
        if (preg_match('/(help|what can you|capabilities|features)/i', $message)) {
            return $this->showCapabilities();
        }

        // Default response with intelligent suggestions
        return $this->defaultResponse($message);
    }

    private function searchPrograms($message)
    {
        $programs = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true)
            ->get();

        if ($programs->isEmpty()) {
            return [
                'message' => "I couldn't find any programs at the moment. Please check back later!",
                'suggestions' => ['Contact support', 'Tell me about universities']
            ];
        }

        return [
            'message' => "I found {$programs->count()} programs for you! Here are some options that might interest you:",
            'programs' => $programs->take(6)->map(function($program) {
                return $this->formatProgram($program);
            }),
            'suggestions' => [
                'Tell me more about MBA',
                'Show online programs',
                'What about fees?',
                'Filter by university'
            ]
        ];
    }

    private function findMBAPrograms()
    {
        $programs = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true)
            ->where(function($query) {
                $query->where('name', 'like', '%MBA%')
                      ->orWhere('name', 'like', '%Master%Business%')
                      ->orWhere('description', 'like', '%MBA%');
            })
            ->get();

        if ($programs->isEmpty()) {
            return [
                'message' => "We don't have MBA programs available right now, but we have other excellent business and management programs!",
                'suggestions' => ['Show all programs', 'Business programs', 'Management courses']
            ];
        }

        return [
            'message' => "Great choice! MBA programs are perfect for career advancement. Here are our MBA offerings:",
            'programs' => $programs->map(function($program) {
                return $this->formatProgram($program);
            }),
            'suggestions' => [
                'Compare fees',
                'Which is best for career growth?',
                'Online or offline?',
                'Show eligibility criteria'
            ]
        ];
    }

    private function careerGuidance($message)
    {
        $programs = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true)
            ->whereHas('outcome', function($query) {
                $query->where('name', 'like', '%career%')
                      ->orWhere('name', 'like', '%professional%')
                      ->orWhere('name', 'like', '%job%');
            })
            ->get();

        if ($programs->isEmpty()) {
            $programs = Program::with(['university', 'intent', 'outcome'])
                ->where('is_active', true)
                ->where('is_featured', true)
                ->get();
        }

        return [
            'message' => "Looking to advance your career? Excellent! These programs are designed to boost your professional growth and open new opportunities:",
            'programs' => $programs->take(5)->map(function($program) {
                return $this->formatProgram($program);
            }),
            'suggestions' => [
                'Which has best ROI?',
                'Show part-time options',
                'What about placement support?',
                'Compare durations'
            ]
        ];
    }

    private function universityInfo($message)
    {
        $universities = University::where('is_active', true)->get();

        if ($universities->isEmpty()) {
            return [
                'message' => "We're currently updating our university partnerships. Please check back soon!",
                'suggestions' => ['Show programs', 'Contact us']
            ];
        }

        $universityList = $universities->map(function($uni) {
            return "• {$uni->name}" . ($uni->location ? " ({$uni->location})" : "");
        })->join("\n");

        return [
            'message' => "We partner with {$universities->count()} prestigious universities:\n\n{$universityList}\n\nWould you like to see programs from a specific university?",
            'suggestions' => $universities->take(4)->pluck('name')->toArray()
        ];
    }

    private function findByDuration($value, $unit)
    {
        $programs = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true)
            ->where('duration', 'like', "%{$value}%{$unit}%")
            ->get();

        if ($programs->isEmpty()) {
            return [
                'message' => "I couldn't find programs with that exact duration, but here are some similar options:",
                'programs' => Program::with(['university', 'intent', 'outcome'])
                    ->where('is_active', true)
                    ->take(4)
                    ->get()
                    ->map(function($program) {
                        return $this->formatProgram($program);
                    }),
                'suggestions' => ['Show all programs', 'Flexible duration options']
            ];
        }

        return [
            'message' => "Found {$programs->count()} programs with {$value} {$unit} duration:",
            'programs' => $programs->map(function($program) {
                return $this->formatProgram($program);
            }),
            'suggestions' => ['Compare fees', 'Show online options', 'Tell me more']
        ];
    }

    private function findByBudget($message)
    {
        $isAffordable = preg_match('/(cheap|affordable|budget|low)/i', $message);

        $query = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true)
            ->whereNotNull('fees');

        if ($isAffordable) {
            $programs = $query->orderBy('fees', 'asc')->take(6)->get();
            $msg = "Here are our most affordable programs:";
        } else {
            $programs = $query->orderBy('fees', 'desc')->take(6)->get();
            $msg = "Here are our premium programs:";
        }

        return [
            'message' => $msg,
            'programs' => $programs->map(function($program) {
                return $this->formatProgram($program);
            }),
            'suggestions' => [
                'Show payment options',
                'EMI available?',
                'Scholarships?',
                'Compare all fees'
            ]
        ];
    }

    private function findByMode($mode)
    {
        $mode = strtolower($mode);

        $programs = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true)
            ->where('mode', 'like', "%{$mode}%")
            ->get();

        if ($programs->isEmpty()) {
            return [
                'message' => "I couldn't find programs with that specific mode. Here are all available programs:",
                'programs' => Program::with(['university', 'intent', 'outcome'])
                    ->where('is_active', true)
                    ->take(5)
                    ->get()
                    ->map(function($program) {
                        return $this->formatProgram($program);
                    }),
                'suggestions' => ['Show all modes', 'Flexible learning options']
            ];
        }

        return [
            'message' => "Found {$programs->count()} {$mode} programs for you:",
            'programs' => $programs->map(function($program) {
                return $this->formatProgram($program);
            }),
            'suggestions' => [
                'Compare with other modes',
                'Show fees',
                'Duration details'
            ]
        ];
    }

    private function showCapabilities()
    {
        return [
            'message' => "I can help you with:\n\n" .
                "🎓 Finding programs based on your interests\n" .
                "💼 Career guidance and recommendations\n" .
                "🏛️ Information about universities\n" .
                "💰 Budget-friendly options\n" .
                "⏱️ Programs by duration\n" .
                "🌐 Online/Offline learning modes\n" .
                "📊 Comparing different programs\n\n" .
                "Just ask me anything!",
            'suggestions' => [
                'Show all programs',
                'I want career growth',
                'Affordable options',
                'Online programs'
            ]
        ];
    }

    private function defaultResponse($message)
    {
        $programs = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return [
            'message' => "I'm here to help you find the perfect program! Here are some popular options, or you can ask me something specific:",
            'programs' => $programs->map(function($program) {
                return $this->formatProgram($program);
            }),
            'suggestions' => [
                'Show all programs',
                'Career advancement programs',
                'MBA programs',
                'What can you help with?'
            ]
        ];
    }

    private function getProgramDisplayResponse($message)
    {
        // User explicitly wants to see programs
        $programs = Program::with(['university', 'intent', 'outcome'])
            ->where('is_active', true);

        // Filter by type if specified
        if (stripos($message, 'mba') !== false) {
            $programs = $programs->where(function($q) {
                $q->where('name', 'like', '%MBA%')
                  ->orWhere('description', 'like', '%MBA%');
            });
        }

        $programs = $programs->take(6)->get();

        return [
            'message' => "Here are the programs I found for you! Take a look and let me know if you have any questions:",
            'suggestions' => [
                'Tell me more about these',
                'Compare fees',
                'Which is best for me?',
                'Show more programs'
            ],
            'programs' => $programs->map(function($program) {
                return $this->formatProgram($program);
            })->toArray()
        ];
    }

    private function formatProgram($program)
    {
        return [
            'id' => $program->id,
            'name' => $program->name,
            'description' => $program->description,
            'university' => $program->university->name ?? 'N/A',
            'duration' => $program->duration,
            'mode' => $program->mode,
            'fees' => $program->fees ? '₹' . number_format($program->fees, 2) : 'Contact for fees',
            'image' => $program->image_url ?? $program->image,
            'is_featured' => $program->is_featured
        ];
    }
}

