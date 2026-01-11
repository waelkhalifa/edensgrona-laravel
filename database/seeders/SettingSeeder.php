<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::create([
            'key' => 'google_reviews_url',
            'value' => 'https://www.google.com/search?q=Edens+Gr%C3%B6na+Tr%C3%A4dg%C3%A5rdsservice+AB+Reviews',
            'type' => 'url',
            'group' => 'general',
        ]);
        
        Setting::create([
            'key' => 'site_title',
            'value' => 'Edens Gröna',
            'type' => 'text',
            'group' => 'general',
        ]);
        
        Setting::create([
            'key' => 'footer_text',
            'value' => '© 2025 - Utvecklad av Multicaret Inc.',
            'type' => 'text',
            'group' => 'footer',
        ]);
    }
}
