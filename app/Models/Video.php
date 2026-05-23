<?php

namespace App\Models;

use App\Enums\VideoVisibility;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Video extends Model
{
    protected $fillable = [
        'title',
        'description',
        'allow_comments',
        'for_kids',
        'visibility'
    ];


    protected function casts(): array
    {
        return [
            'visibility' => VideoVisibility::class,
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('created_at');;
    }

    public function usersThroughVideoProgress(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'video_progress')
            ->withPivot([
                'id',
                'watched_seconds',
                'completed_at',
                'last_watched_at',
                'created_at',
                'updated_at',
            ])
            ->withTimestamps();
    }

    public function reports(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public function videoRendetions(): HasMany
    {
        return $this->hasMany(VideoRendition::class);
    }

     public function audioRendetions(): HasMany
    {
        return $this->hasMany(AudioRendition::class);
    }

    public function videoThumbnails(): HasMany
    {
        return $this->hasMany(VideoThumbnail::class);
    }

    public function videoProcessingRuns(): HasMany
    {
        return $this->hasMany(VideoProcessingRun::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

}
