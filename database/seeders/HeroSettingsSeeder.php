<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HeroSettingsSeeder extends Seeder
{
    public function run(): void
    {
        // Your actual file paths
        $files = [
            [
                'source' => public_path('assets/img/new-img/logo.png'),
                'destination' => 'hero/logo.png',
                'name' => 'Logo'
            ],
            [
                'source' => public_path('assets/img/new-img/hero-bg.jpg'),
                'destination' => 'hero/background-image.jpg',
                'name' => 'Background Image'
            ],
            [
                'source' => public_path('assets/video/hero.mp4'),
                'destination' => 'hero/background-video.mp4',
                'name' => 'Background Video'
            ],
        ];

        // Create hero directory
        Storage::disk('public')->makeDirectory('hero');

        foreach ($files as $file) {
            if (File::exists($file['source'])) {
                Storage::disk('public')->put(
                    $file['destination'],
                    File::get($file['source'])
                );
                $this->command->info("✓ {$file['name']} copied successfully");
            } else {
                $this->command->warn("⚠ {$file['name']} not found at: {$file['source']}");
            }
        }

        $this->command->info("✅ Hero media files seeded!");
    }
}
