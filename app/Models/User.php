<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }

    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(Video::class)->withPivot('created_at');;
    }
    
    public function subscriptions(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'subscriptions',
            'subscriber_id',
            'channel_id'
        )->withPivot('created_at');
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'subscriptions',
            'channel_id',
            'subscriber_id'
        )->withPivot('created_at');
    }

    public function videosThroughVideoProgress(): BelongsToMany
    {
        return $this->belongsToMany(Video::class, 'video_progress')
            ->withPivot([
                'watched_seconds',
                'completed_at',
                'last_watched_at',
            ])
            ->withTimestamps();
    }

    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class);
    }

    public function reportsMade(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function reportsReceived(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }
}
