<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeAnalysis extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'file_path',
        'file_name',
        'extracted_text',
        'keywords',
        'skills',
        'highest_qualification',
        'years_of_experience',
        'work_experience',
        'education',
        'matched_programs',
        'career_goals',
        'preferred_field',
    ];

    protected $casts = [
        'keywords' => 'array',
        'skills' => 'array',
        'work_experience' => 'array',
        'education' => 'array',
        'matched_programs' => 'array',
    ];
}
