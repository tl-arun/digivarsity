<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    protected $fillable = [
        'name',
        'image',
        'image_url',
        'type',
        'description',
        'curriculum',
        'duration',
        'mode',
        'fees',
        'eligibility',
        'university_id',
        'intent_id',
        'outcome_id',
        'intent_tags',
        'outcome_tags',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'fees' => 'decimal:2',
        'intent_tags' => 'array',
        'outcome_tags' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function intent(): BelongsTo
    {
        return $this->belongsTo(Intent::class);
    }

    public function outcome(): BelongsTo
    {
        return $this->belongsTo(Outcome::class);
    }
}
