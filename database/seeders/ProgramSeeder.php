<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\University;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $universities = University::all();

        if ($universities->isEmpty()) {
            $this->command->warn('No universities found. Please run UniversitySeeder first.');
            return;
        }

        $programs = [
            [
                'name' => 'MBA in Digital Marketing',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop',
                'type' => 'online',
                'description' => 'Comprehensive MBA program focusing on digital marketing strategies, analytics, and modern marketing techniques. Learn from industry experts and gain hands-on experience.',
                'curriculum' => 'Digital Marketing Strategy, SEO/SEM, Social Media Marketing, Content Marketing, Marketing Analytics, Brand Management, Consumer Behavior, E-commerce',
                'duration' => '2 years',
                'mode' => 'Online',
                'fees' => 250000,
                'eligibility' => 'Bachelor\'s degree with minimum 50% marks. Work experience preferred.',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'Executive MBA',
                'type' => 'executive',
                'description' => 'Designed for working professionals with 5+ years of experience. Weekend classes with flexible schedule.',
                'curriculum' => 'Strategic Management, Leadership, Finance, Operations, Marketing, Business Analytics, Innovation Management',
                'duration' => '18 months',
                'mode' => 'Hybrid (Weekend)',
                'fees' => 450000,
                'eligibility' => 'Bachelor\'s degree with 5+ years of work experience',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'Master of Data Science',
                'type' => 'online',
                'description' => 'Advanced program in data science covering machine learning, AI, and big data analytics.',
                'curriculum' => 'Python Programming, Machine Learning, Deep Learning, Big Data, Data Visualization, Statistics, AI Applications',
                'duration' => '2 years',
                'mode' => 'Online',
                'fees' => 300000,
                'eligibility' => 'Bachelor\'s in Computer Science, IT, or related field',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'MBA in Finance',
                'type' => 'odl',
                'description' => 'Specialized MBA program focusing on financial management, investment banking, and corporate finance.',
                'curriculum' => 'Financial Management, Investment Analysis, Corporate Finance, Risk Management, Financial Markets, Portfolio Management',
                'duration' => '2 years',
                'mode' => 'Distance Learning',
                'fees' => 180000,
                'eligibility' => 'Bachelor\'s degree in any discipline',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'MBA in Human Resource Management',
                'type' => 'online',
                'description' => 'Comprehensive HR management program covering talent acquisition, development, and organizational behavior.',
                'curriculum' => 'HR Strategy, Talent Management, Organizational Behavior, Performance Management, Labor Laws, Compensation Management',
                'duration' => '2 years',
                'mode' => 'Online',
                'fees' => 220000,
                'eligibility' => 'Bachelor\'s degree with minimum 50% marks',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'Master of Computer Applications (MCA)',
                'type' => 'online',
                'description' => 'Advanced program in computer applications and software development.',
                'curriculum' => 'Advanced Java, Web Technologies, Mobile App Development, Database Management, Cloud Computing, Cyber Security',
                'duration' => '2 years',
                'mode' => 'Online',
                'fees' => 150000,
                'eligibility' => 'Bachelor\'s degree in Computer Science or BCA',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'MBA in Operations Management',
                'type' => 'work-linked',
                'description' => 'Work-integrated MBA program focusing on operations, supply chain, and logistics management.',
                'curriculum' => 'Operations Strategy, Supply Chain Management, Quality Management, Project Management, Lean Six Sigma',
                'duration' => '2 years',
                'mode' => 'Work-Linked',
                'fees' => 280000,
                'eligibility' => 'Bachelor\'s degree with current employment',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'Master of Business Analytics',
                'type' => 'online',
                'description' => 'Advanced analytics program combining business acumen with data science skills.',
                'curriculum' => 'Business Analytics, Predictive Modeling, Data Mining, Business Intelligence, R Programming, Tableau',
                'duration' => '18 months',
                'mode' => 'Online',
                'fees' => 320000,
                'eligibility' => 'Bachelor\'s degree with basic statistics knowledge',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'MBA in Healthcare Management',
                'type' => 'executive',
                'description' => 'Specialized program for healthcare professionals looking to move into management roles.',
                'curriculum' => 'Healthcare Systems, Hospital Management, Healthcare Finance, Quality in Healthcare, Healthcare IT',
                'duration' => '2 years',
                'mode' => 'Weekend',
                'fees' => 350000,
                'eligibility' => 'Bachelor\'s degree, preferably in healthcare',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
            [
                'name' => 'Master of Project Management',
                'type' => 'online',
                'description' => 'Comprehensive program covering project management methodologies and best practices.',
                'curriculum' => 'Project Planning, Risk Management, Agile & Scrum, PMP Preparation, Resource Management, Stakeholder Management',
                'duration' => '1 year',
                'mode' => 'Online',
                'fees' => 200000,
                'eligibility' => 'Bachelor\'s degree with 2+ years experience',
                'university_id' => $universities->random()->id,
                'is_active' => true,
            ],
        ];

        foreach ($programs as $programData) {
            Program::firstOrCreate(
                ['name' => $programData['name']],
                $programData
            );
        }
    }
}
