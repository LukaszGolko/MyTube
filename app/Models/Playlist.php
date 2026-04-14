<?php

namespace App\Models;

use App\Enums\PlaylistVisibility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Playlist extends Model
{
    protected function casts(): array
    {
        return [
            'visibility' => PlaylistVisibility::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
