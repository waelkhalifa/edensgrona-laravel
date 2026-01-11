<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Service extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'icon',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Register media collections
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
             ->singleFile() // Only one image per service
             ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp']);

        $this->addMediaCollection('icon')
             ->singleFile()
             ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/svg+xml']);
    }

    /**
     * Register media conversions (for thumbnails, etc.)
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
             ->width(368)
             ->height(232)
             ->sharpen(10)
             ->performOnCollections('image');

        $this->addMediaConversion('large')
             ->width(1200)
             ->height(800)
             ->sharpen(10)
             ->performOnCollections('image');
    }

    /**
     * Get the main image URL
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image');
    }

    /**
     * Get the thumbnail URL
     */
    public function getThumbUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image', 'thumb');
    }

    /**
     * Get the icon URL
     */
    public function getIconUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('icon');
    }
}
