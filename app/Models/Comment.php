<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Comment extends Model
{
    public function reports(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}
