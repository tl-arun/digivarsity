<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $programs = Program::all();

        if ($programs->isEmpty()) {
            $this->command->warn('No programs found. Please run ProgramSeeder first.');
            return;
        }

        $testimonials = [
            [
                'student_name' => 'Rajesh Kumar',
                'before_role' => 'Marketing Executive',
                'after_role' => 'Marketing Manager',
                'message' => 'This program completely transformed my career! The curriculum was practical and industry-relevant. Within 6 months of completion, I got promoted to a managerial role with a 40% salary hike.',
            ],
            [
                'student_name' => 'Priya Sharma',
                'before_role' => 'Software Developer',
                'after_role' => 'Data Scientist',
                'message' => 'The faculty and course content were exceptional. I successfully transitioned from development to data science. The hands-on projects gave me real-world experience.',
            ],
            [
                'student_name' => 'Amit Patel',
                'before_role' => 'Sales Manager',
                'after_role' => 'Business Development Head',
                'message' => 'Best decision of my career! The program helped me develop strategic thinking and leadership skills. I\'m now heading the BD department at a Fortune 500 company.',
            ],
            [
                'student_name' => 'Sneha Reddy',
                'before_role' => 'HR Executive',
                'after_role' => 'HR Manager',
                'message' => 'The flexible online format allowed me to balance work and studies perfectly. The networking opportunities were invaluable. Highly recommended!',
            ],
            [
                'student_name' => 'Vikram Singh',
                'before_role' => 'Operations Executive',
                'after_role' => 'Operations Manager',
                'message' => 'Excellent program with great ROI. The practical approach and case studies helped me apply learnings immediately at work. Got promoted within a year!',
            ],
        ];

        // Add 2-3 testimonials for each program
        foreach ($programs as $program) {
            $count = rand(2, 3);
            for ($i = 0; $i < $count; $i++) {
                $testimonial = $testimonials[array_rand($testimonials)];
                Testimonial::create([
                    'program_id' => $program->id,
                    'student_name' => $testimonial['student_name'],
                    'before_role' => $testimonial['before_role'],
                    'after_role' => $testimonial['after_role'],
                    'message' => $testimonial['message'],
                    'is_active' => true,
                ]);
            }
        }
    }
}
