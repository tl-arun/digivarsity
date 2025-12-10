<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomePageSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Hero Section
            ['key' => 'hero_title', 'value' => 'Transform Your Future Today!', 'type' => 'text', 'section' => 'hero', 'description' => 'Main hero title'],
            ['key' => 'hero_subtitle', 'value' => '🚀 Your Gateway to Quality Education & Career Excellence', 'type' => 'text', 'section' => 'hero', 'description' => 'Hero subtitle'],
            ['key' => 'hero_description', 'value' => 'Join 10,000+ successful professionals who transformed their careers with world-class programs from top universities', 'type' => 'text', 'section' => 'hero', 'description' => 'Hero description'],
            ['key' => 'hero_badge', 'value' => '🎓 #1 Online Education Platform in India', 'type' => 'text', 'section' => 'hero', 'description' => 'Hero badge text'],

            // Stats Section
            ['key' => 'stat_programs', 'value' => '10', 'type' => 'number', 'section' => 'stats', 'description' => 'Number of programs'],
            ['key' => 'stat_universities', 'value' => '8', 'type' => 'number', 'section' => 'stats', 'description' => 'Number of universities'],
            ['key' => 'stat_students', 'value' => '10000', 'type' => 'number', 'section' => 'stats', 'description' => 'Number of students'],
            ['key' => 'stat_success_rate', 'value' => '95', 'type' => 'number', 'section' => 'stats', 'description' => 'Success rate percentage'],

            // Benefits Section
            ['key' => 'benefit_1_title', 'value' => 'Easy EMI Options', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 1 title'],
            ['key' => 'benefit_1_description', 'value' => 'Start learning now, pay later! Flexible payment plans starting at ₹5,000/month', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 1 description'],
            ['key' => 'benefit_1_badge', 'value' => '0% Interest Available', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 1 badge'],

            ['key' => 'benefit_2_title', 'value' => '100% Placement Support', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 2 title'],
            ['key' => 'benefit_2_description', 'value' => 'Dedicated career counseling, resume building, and interview preparation', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 2 description'],
            ['key' => 'benefit_2_badge', 'value' => '500+ Hiring Partners', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 2 badge'],

            ['key' => 'benefit_3_title', 'value' => 'Learn at Your Pace', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 3 title'],
            ['key' => 'benefit_3_description', 'value' => 'Flexible schedules, weekend batches, and lifetime access to course materials', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 3 description'],
            ['key' => 'benefit_3_badge', 'value' => '24/7 Learning Access', 'type' => 'text', 'section' => 'benefits', 'description' => 'Benefit 3 badge'],

            // Offer Banner
            ['key' => 'offer_banner_text', 'value' => '🎉 Limited Time: Get 20% OFF on Early Bird Registrations! 🎉', 'type' => 'text', 'section' => 'offer', 'description' => 'Offer banner text'],
            ['key' => 'offer_banner_enabled', 'value' => 'true', 'type' => 'boolean', 'section' => 'offer', 'description' => 'Show/hide offer banner'],

            // Contact Section
            ['key' => 'contact_email', 'value' => 'info@digivarsity.com', 'type' => 'text', 'section' => 'contact', 'description' => 'Contact email'],
            ['key' => 'contact_phone', 'value' => '+91 1234567890', 'type' => 'text', 'section' => 'contact', 'description' => 'Contact phone'],
            ['key' => 'contact_location', 'value' => 'Mumbai, India', 'type' => 'text', 'section' => 'contact', 'description' => 'Contact location'],

            // Social Media
            ['key' => 'social_facebook', 'value' => '#', 'type' => 'text', 'section' => 'social', 'description' => 'Facebook URL'],
            ['key' => 'social_twitter', 'value' => '#', 'type' => 'text', 'section' => 'social', 'description' => 'Twitter URL'],
            ['key' => 'social_linkedin', 'value' => '#', 'type' => 'text', 'section' => 'social', 'description' => 'LinkedIn URL'],
            ['key' => 'social_instagram', 'value' => '#', 'type' => 'text', 'section' => 'social', 'description' => 'Instagram URL'],
        ];

        foreach ($settings as $setting) {
            DB::table('home_page_settings')->updateOrInsert(
                ['key' => $setting['key']],
                array_merge($setting, [
                    'created_at' => now(),
                    'updated_at' => now()
                ])
            );
        }

        $this->command->info('Home page settings seeded successfully!');
    }
}
