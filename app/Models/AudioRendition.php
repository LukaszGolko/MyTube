<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class AudioRendition extends Model
{
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}
