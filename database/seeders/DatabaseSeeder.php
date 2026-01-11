<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
//            ContactInfoSeeder::class,
//            SettingSeeder::class,
            SocialLinkSeeder::class,
//            HeroSectionSeeder::class,
            ServiceSeeder::class,
            ProcessStepSeeder::class,
            HeroSettingsSeeder::class,
        ]);
    }
}
