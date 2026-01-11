<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;

class ContactSubmission extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'customer_type',
        'help_needed',
        'measurements',
        'message',
        'status',
        'notes',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Register media collections
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachments')
             ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/jpg', 'application/pdf']);
    }

    // Accessor for full name
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Accessor for full address
    public function getFullAddressAttribute(): string
    {
        return "{$this->address}, {$this->postal_code} {$this->city}";
    }

    // Status helper methods
    public function markAsRead(): void
    {
        $this->update(['status' => 'read']);
    }

    public function markAsReplied(): void
    {
        $this->update(['status' => 'replied']);
    }

    public function markAsArchived(): void
    {
        $this->update(['status' => 'archived']);
    }

    // Check if has attachments
    public function hasAttachments(): bool
    {
        return $this->hasMedia('attachments');
    }

    // Get all attachments
    public function getAttachments(): MediaCollection
    {
        return $this->getMedia('attachments');
    }
}
