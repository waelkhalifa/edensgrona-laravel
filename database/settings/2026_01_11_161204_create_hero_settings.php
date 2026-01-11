<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new
class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('hero.title', 'Välkommen till Edens Gröna');
        $this->migrator->add('hero.subtitle', 'Trädgårdsservice med passion');
        $this->migrator->add('hero.description',
            'Vi skapar vackra och hållbara trädgårdsmiljöer som ger glädje året runt.');
        $this->migrator->add('hero.primary_button_text', 'Kontakta oss');
        $this->migrator->add('hero.primary_button_url', '/contact');
        $this->migrator->add('hero.secondary_button_text', 'Våra tjänster');
        $this->migrator->add('hero.secondary_button_url', '/services');
        $this->migrator->add('hero.is_active', true);
        $this->migrator->add('hero.logo_path', 'hero/logo.png');
        $this->migrator->add('hero.background_video_path', 'hero/background-video.mp4');
        $this->migrator->add('hero.background_image_path', 'hero/background-image.jpg');
    }
};
