<?php

namespace App\Http\Controllers;

use App\Models\ResumeAnalysis;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeAnalysisController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'user_input' => 'nullable|string|max:2000',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Check if user provided text input instead of resume
        if ($request->has('user_input') && !$request->hasFile('resume')) {
            return $this->analyzeUserInput($request);
        }

        if (!$request->hasFile('resume')) {
            return response()->json([
                'success' => false,
                'message' => 'Please upload a resume or provide your goals/requirements'
            ], 422);
        }

        $file = $request->file('resume');
        $fileName = time() . '_' . $file->getClientOriginalName();

        try {
            $filePath = $file->storeAs('resumes', $fileName, 'public');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error uploading file: ' . $e->getMessage()
            ], 500);
        }

        // Extract text from resume
        $extractedText = $this->extractTextFromFile(storage_path('app/public/' . $filePath));

        // Analyze resume
        $analysis = $this->analyzeResume($extractedText);

        // Match with programs
        $matchedPrograms = $this->matchPrograms($analysis);

        // Save to database
        $resumeAnalysis = ResumeAnalysis::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'extracted_text' => $extractedText,
            'keywords' => $analysis['keywords'],
            'skills' => $analysis['skills'],
            'highest_qualification' => $analysis['highest_qualification'],
            'years_of_experience' => $analysis['years_of_experience'],
            'work_experience' => $analysis['work_experience'],
            'education' => $analysis['education'],
            'matched_programs' => $matchedPrograms,
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $resumeAnalysis->id,
                'analysis' => $analysis,
                'matched_programs' => $matchedPrograms,
            ],
        ]);
    }

    public function updatePreferences(Request $request, $id)
    {
        $request->validate([
            'career_goals' => 'nullable|string',
            'preferred_field' => 'nullable|string',
        ]);

        $resumeAnalysis = ResumeAnalysis::findOrFail($id);
        $resumeAnalysis->update([
            'career_goals' => $request->career_goals,
            'preferred_field' => $request->preferred_field,
        ]);

        // Re-match programs based on preferences
        $analysis = [
            'keywords' => $resumeAnalysis->keywords,
            'skills' => $resumeAnalysis->skills,
            'highest_qualification' => $resumeAnalysis->highest_qualification,
            'career_goals' => $request->career_goals,
            'preferred_field' => $request->preferred_field,
        ];

        $matchedPrograms = $this->matchPrograms($analysis);
        $resumeAnalysis->update(['matched_programs' => $matchedPrograms]);

        return response()->json([
            'success' => true,
            'matched_programs' => $matchedPrograms,
        ]);
    }

    private function extractTextFromFile($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $text = '';

        try {
            if ($extension === 'pdf') {
                // For PDF files - using basic extraction
                // In production, use: smalot/pdfparser or similar
                if (class_exists('\Smalot\PdfParser\Parser')) {
                    $parser = new \Smalot\PdfParser\Parser();
                    $pdf = $parser->parseFile($filePath);
                    $text = $pdf->getText();
                } else {
                    $text = "PDF parsing library not installed. Please install smalot/pdfparser";
                }
            } elseif (in_array($extension, ['doc', 'docx'])) {
                // For Word files - basic extraction
                // In production, use: phpoffice/phpword
                if (class_exists('\PhpOffice\PhpWord\IOFactory')) {
                    $phpWord = \PhpOffice\PhpWord\IOFactory::load($filePath);
                    foreach ($phpWord->getSections() as $section) {
                        foreach ($section->getElements() as $element) {
                            if (method_exists($element, 'getText')) {
                                $text .= $element->getText() . "\n";
                            }
                        }
                    }
                } else {
                    $text = "Word parsing library not installed. Please install phpoffice/phpword";
                }
            }
        } catch (\Exception $e) {
            $text = "Error extracting text: " . $e->getMessage();
        }

        return $text ?: "Sample resume text for demonstration";
    }

    private function analyzeResume($text)
    {
        // Keywords extraction
        $keywords = $this->extractKeywords($text);

        // Skills extraction
        $skills = $this->extractSkills($text);

        // Education extraction
        $education = $this->extractEducation($text);

        // Work experience extraction
        $workExperience = $this->extractWorkExperience($text);

        // Determine highest qualification
        $highestQualification = $this->determineHighestQualification($education);

        // Calculate years of experience
        $yearsOfExperience = $this->calculateExperience($workExperience);

        return [
            'keywords' => $keywords,
            'skills' => $skills,
            'education' => $education,
            'work_experience' => $workExperience,
            'highest_qualification' => $highestQualification,
            'years_of_experience' => $yearsOfExperience,
        ];
    }

    private function extractKeywords($text)
    {
        $text = strtolower($text);
        $keywords = [];

        // Common professional keywords
        $keywordPatterns = [
            'management', 'leadership', 'strategy', 'business', 'marketing',
            'technology', 'engineering', 'data', 'analytics', 'finance',
            'operations', 'project', 'development', 'design', 'research',
            'sales', 'consulting', 'digital', 'innovation', 'healthcare',
            'education', 'human resources', 'supply chain', 'quality',
        ];

        foreach ($keywordPatterns as $keyword) {
            if (stripos($text, $keyword) !== false) {
                $keywords[] = $keyword;
            }
        }

        return array_unique($keywords);
    }

    private function extractSkills($text)
    {
        $text = strtolower($text);
        $skills = [];

        // Common skills
        $skillPatterns = [
            'python', 'java', 'javascript', 'php', 'sql', 'react', 'angular',
            'leadership', 'communication', 'teamwork', 'problem solving',
            'project management', 'agile', 'scrum', 'excel', 'powerpoint',
            'data analysis', 'machine learning', 'ai', 'cloud computing',
            'aws', 'azure', 'marketing', 'seo', 'content writing',
        ];

        foreach ($skillPatterns as $skill) {
            if (stripos($text, $skill) !== false) {
                $skills[] = $skill;
            }
        }

        return array_unique($skills);
    }

    private function extractEducation($text)
    {
        $education = [];
        $degrees = ['phd', 'doctorate', 'master', 'mba', 'bachelor', 'b.tech', 'm.tech', 'bba', 'bca', 'mca'];

        foreach ($degrees as $degree) {
            if (stripos($text, $degree) !== false) {
                $education[] = ucfirst($degree);
            }
        }

        return array_unique($education);
    }

    private function extractWorkExperience($text)
    {
        // Simple pattern matching for years of experience
        $experience = [];

        if (preg_match_all('/(\d+)\+?\s*(years?|yrs?)/i', $text, $matches)) {
            foreach ($matches[1] as $years) {
                $experience[] = ['years' => (int)$years];
            }
        }

        return $experience;
    }

    private function determineHighestQualification($education)
    {
        $qualificationHierarchy = [
            'phd' => 5,
            'doctorate' => 5,
            'master' => 4,
            'mba' => 4,
            'm.tech' => 4,
            'mca' => 4,
            'bachelor' => 3,
            'b.tech' => 3,
            'bba' => 3,
            'bca' => 3,
        ];

        $highest = 'Not specified';
        $highestLevel = 0;

        foreach ($education as $degree) {
            $degreeLower = strtolower($degree);
            foreach ($qualificationHierarchy as $qual => $level) {
                if (stripos($degreeLower, $qual) !== false && $level > $highestLevel) {
                    $highestLevel = $level;
                    $highest = $degree;
                }
            }
        }

        return $highest;
    }

    private function calculateExperience($workExperience)
    {
        if (empty($workExperience)) {
            return 0;
        }

        $maxYears = 0;
        foreach ($workExperience as $exp) {
            if (isset($exp['years']) && $exp['years'] > $maxYears) {
                $maxYears = $exp['years'];
            }
        }

        return $maxYears;
    }

    private function matchPrograms($analysis)
    {
        $programs = Program::where('is_active', true)->with('university')->get();
        $matchedPrograms = [];

        foreach ($programs as $program) {
            $score = 0;
            $reasons = [];

            // Match based on keywords
            $programText = strtolower($program->name . ' ' . $program->description);
            foreach ($analysis['keywords'] ?? [] as $keyword) {
                if (stripos($programText, $keyword) !== false) {
                    $score += 10;
                    $reasons[] = "Matches your interest in " . ucfirst($keyword);
                }
            }

            // Match based on skills
            foreach ($analysis['skills'] ?? [] as $skill) {
                if (stripos($programText, $skill) !== false) {
                    $score += 8;
                    $reasons[] = "Aligns with your " . ucfirst($skill) . " skills";
                }
            }

            // Match based on qualification level
            if (isset($analysis['highest_qualification'])) {
                $qual = strtolower($analysis['highest_qualification']);
                if (stripos($qual, 'master') !== false || stripos($qual, 'mba') !== false) {
                    if (stripos($program->name, 'executive') !== false || stripos($program->name, 'advanced') !== false) {
                        $score += 15;
                        $reasons[] = "Suitable for your qualification level";
                    }
                }
            }

            // Match based on career goals
            if (isset($analysis['career_goals'])) {
                if (stripos($programText, strtolower($analysis['career_goals'])) !== false) {
                    $score += 20;
                    $reasons[] = "Directly supports your career goals";
                }
            }

            // Match based on preferred field
            if (isset($analysis['preferred_field'])) {
                if (stripos($programText, strtolower($analysis['preferred_field'])) !== false) {
                    $score += 20;
                    $reasons[] = "Matches your preferred field";
                }
            }

            if ($score > 0) {
                $matchedPrograms[] = [
                    'program_id' => $program->id,
                    'program_name' => $program->name,
                    'university_name' => $program->university->name ?? 'N/A',
                    'match_score' => $score,
                    'reasons' => $reasons,
                    'duration' => $program->duration,
                    'fees' => $program->fees,
                    'image_url' => $program->image_url,
                ];
            }
        }

        // Sort by match score
        usort($matchedPrograms, function ($a, $b) {
            return $b['match_score'] - $a['match_score'];
        });

        return array_slice($matchedPrograms, 0, 6); // Return top 6 matches
    }

    private function analyzeUserInput($request)
    {
        $userInput = $request->input('user_input');

        // Analyze user input text
        $analysis = $this->analyzeResume($userInput);

        // Add user's explicit goals
        $analysis['career_goals'] = $userInput;
        $analysis['user_provided_text'] = true;

        // Match with programs
        $matchedPrograms = $this->matchPrograms($analysis);

        // Save to database
        $resumeAnalysis = ResumeAnalysis::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'file_path' => null,
            'file_name' => 'User Input',
            'extracted_text' => $userInput,
            'keywords' => $analysis['keywords'],
            'skills' => $analysis['skills'],
            'highest_qualification' => $analysis['highest_qualification'],
            'years_of_experience' => $analysis['years_of_experience'],
            'work_experience' => $analysis['work_experience'],
            'education' => $analysis['education'],
            'matched_programs' => $matchedPrograms,
            'career_goals' => $userInput,
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $resumeAnalysis->id,
                'analysis' => $analysis,
                'matched_programs' => $matchedPrograms,
            ],
        ]);
    }
}
