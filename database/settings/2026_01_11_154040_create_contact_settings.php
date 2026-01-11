<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('contact.email', 'info@edensgrona.se');
        $this->migrator->add('contact.phone', '+46 123 456 789');
        $this->migrator->add('contact.address', 'Stockholm, Sweden');
        $this->migrator->add('contact.facebook_url', 'https://facebook.com/edensgrona');
        $this->migrator->add('contact.instagram_url', 'https://instagram.com/edensgrona');
        $this->migrator->add('contact.twitter_url', null);
        $this->migrator->add('contact.linkedin_url', null);
        $this->migrator->add('contact.youtube_url', null);
        $this->migrator->add('contact.whatsapp_number', '+46123456789');
    }
};
