<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoThumbnail extends Model
{
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}
