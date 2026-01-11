<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            [
                'platform' => 'Google Maps',
                'url' => 'https://www.google.com/maps/dir//Tirupsv%C3%A4gen+99,+245+93+Staffanstorp',
                'icon' => 'fa-solid fa-location-dot',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'platform' => 'Instagram',
                'url' => 'https://www.instagram.com/edensgrona/',
                'icon' => 'fa-brands fa-instagram',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'platform' => 'YouTube',
                'url' => 'https://www.youtube.com/@edensgrona8933',
                'icon' => 'fa-brands fa-youtube',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'platform' => 'Facebook',
                'url' => 'https://www.facebook.com/profile.php?id=61569912250780',
                'icon' => 'fa-brands fa-square-facebook',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'platform' => 'TikTok',
                'url' => 'https://www.tiktok.com/@edens.grna',
                'icon' => 'fa-brands fa-tiktok',
                'order' => 5,
                'is_active' => true,
            ],
        ];
        
        foreach ($links as $link) {
            SocialLink::create($link);
        }
    }
}
