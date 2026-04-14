<?php

namespace App\Models;

use App\Enums\VideoProcessingStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoProcessingRun extends Model
{
    protected function casts(): array
    {
        return
        [
            'status' => VideoProcessingStatus::class
        ];
    }

    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}
