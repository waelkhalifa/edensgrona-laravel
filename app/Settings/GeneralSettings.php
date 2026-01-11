<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_title;
    public string $google_reviews_url;
    public string $footer_text;
    public string $postal_address;
    public string $visiting_address;


    public static function group(): string
    {
        return 'general';
    }
}
