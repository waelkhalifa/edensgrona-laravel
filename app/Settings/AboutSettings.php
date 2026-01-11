<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutSettings extends Settings
{
    public string $title;
    public ?string $subtitle;
    public string $content;
    public ?string $image_path;
    public static function group(): string
    {
        return 'about';
    }
}
