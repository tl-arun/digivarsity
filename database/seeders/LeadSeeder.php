<?php

namespace Database\Seeders;

use App\Models\Lead;
use App\Models\Program;
use App\Models\Intent;
use App\Models\Outcome;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    public function run(): void
    {
        $programs = Program::all();
        $intents = Intent::all();
        $outcomes = Outcome::all();

        if ($programs->isEmpty() || $intents->isEmpty() || $outcomes->isEmpty()) {
            $this->command->warn('Required data not found. Please run other seeders first.');
            return;
        }

        $leads = [
            ['name' => 'Rahul Verma', 'email' => 'rahul.verma@example.com', 'phone' => '9876543210', 'source' => 'website', 'status' => 'new'],
            ['name' => 'Anita Desai', 'email' => 'anita.desai@example.com', 'phone' => '9876543211', 'source' => 'referral', 'status' => 'contacted'],
            ['name' => 'Suresh Menon', 'email' => 'suresh.menon@example.com', 'phone' => '9876543212', 'source' => 'website', 'status' => 'qualified'],
            ['name' => 'Kavita Iyer', 'email' => 'kavita.iyer@example.com', 'phone' => '9876543213', 'source' => 'social media', 'status' => 'new'],
            ['name' => 'Deepak Joshi', 'email' => 'deepak.joshi@example.com', 'phone' => '9876543214', 'source' => 'website', 'status' => 'converted'],
            ['name' => 'Meera Nair', 'email' => 'meera.nair@example.com', 'phone' => '9876543215', 'source' => 'referral', 'status' => 'contacted'],
            ['name' => 'Arjun Kapoor', 'email' => 'arjun.kapoor@example.com', 'phone' => '9876543216', 'source' => 'website', 'status' => 'new'],
            ['name' => 'Pooja Gupta', 'email' => 'pooja.gupta@example.com', 'phone' => '9876543217', 'source' => 'email campaign', 'status' => 'qualified'],
            ['name' => 'Sanjay Rao', 'email' => 'sanjay.rao@example.com', 'phone' => '9876543218', 'source' => 'website', 'status' => 'contacted'],
            ['name' => 'Divya Pillai', 'email' => 'divya.pillai@example.com', 'phone' => '9876543219', 'source' => 'referral', 'status' => 'new'],
            ['name' => 'Karthik Reddy', 'email' => 'karthik.reddy@example.com', 'phone' => '9876543220', 'source' => 'website', 'status' => 'converted'],
            ['name' => 'Lakshmi Krishnan', 'email' => 'lakshmi.k@example.com', 'phone' => '9876543221', 'source' => 'social media', 'status' => 'qualified'],
            ['name' => 'Manoj Kumar', 'email' => 'manoj.kumar@example.com', 'phone' => '9876543222', 'source' => 'website', 'status' => 'new'],
            ['name' => 'Nisha Agarwal', 'email' => 'nisha.agarwal@example.com', 'phone' => '9876543223', 'source' => 'referral', 'status' => 'contacted'],
            ['name' => 'Prakash Sharma', 'email' => 'prakash.sharma@example.com', 'phone' => '9876543224', 'source' => 'website', 'status' => 'lost'],
        ];

        foreach ($leads as $leadData) {
            Lead::create([
                'name' => $leadData['name'],
                'email' => $leadData['email'],
                'phone' => $leadData['phone'],
                'program_id' => $programs->random()->id,
                'intent_id' => $intents->random()->id,
                'outcome_id' => $outcomes->random()->id,
                'source' => $leadData['source'],
                'status' => $leadData['status'],
                'notes' => 'Interested in the program. Follow up required.',
            ]);
        }
    }
}
