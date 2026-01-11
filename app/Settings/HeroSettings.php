<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HeroSettings extends Settings
{
    public string $title;
    public ?string $subtitle;
    public ?string $description;
    public ?string $primary_button_text;
    public ?string $primary_button_url;
    public ?string $secondary_button_text;
    public ?string $secondary_button_url;
    public bool $is_active;

    // Media paths stored as strings
    public ?string $logo_path;
    public ?string $background_video_path;
    public ?string $background_image_path;

    public static function group(): string
    {
        return 'hero';
    }

    public static function encrypted(): array
    {
        return [];
    }
}
