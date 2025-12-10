<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroBackground extends Model
{
    protected $fillable = [
        'image_url',
        'image_type',
        'order',
        'is_active',
        'animation_type',
        'animation_duration'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'animation_duration' => 'integer'
    ];

    public static function getActiveBackgrounds()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
