<?php

namespace App\Models;

use App\Enums\PlaylistVisibility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Report extends Model
{
    protected function casts(): array
    {
        return 
        [
            'status' => PlaylistVisibility::class,
        ];

    }
    
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reportable(): MorphTo
    {
        return $this->morphTo();
    }
}
