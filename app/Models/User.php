<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'city',
        'postal_code',
        'customer_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Register media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
             ->singleFile()
             ->acceptsMimeTypes(['image/jpeg', 'image/jpg', 'image/png']);
    }

    /**
     * Register media conversions
     */
    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumb')
             ->width(100)
             ->height(100)
             ->sharpen(10)
             ->nonQueued();
    }

    /**
     * Get avatar URL
     */
    public function getAvatarUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('avatar', 'thumb') ?: null;
    }

    /**
     * Relationships
     */
    public function contactSubmissions()
    {
        return $this->hasMany(ContactSubmission::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get full address
     */
    public function getFullAddressAttribute(): string
    {
        $parts = array_filter([
            $this->address,
            $this->postal_code,
            $this->city,
        ]);

        return implode(', ', $parts);
    }

    /**
     * Check if user is private customer
     */
    public function isPrivate(): bool
    {
        return $this->customer_type === 'private';
    }

    /**
     * Check if user is company
     */
    public function isCompany(): bool
    {
        return $this->customer_type === 'company';
    }
}
