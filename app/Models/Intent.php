<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Intent extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the programs that have this intent
     */
    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class, 'program_intent');
    }
}
