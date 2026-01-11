<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'status',
        'notes',
    ];

    // Accessor for full name
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // Check if submission is new
    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    // Mark as read
    public function markAsRead(): void
    {
        $this->update(['status' => 'read']);
    }
}
