<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_title', 'Edens Gröna');
        $this->migrator->add('general.google_reviews_url', 'https://www.google.com/search?q=Edens+Gr%C3%B6na+Tr%C3%A4dg%C3%A5rdsservice+AB+Reviews');
        $this->migrator->add('general.footer_text', '© 2025 - Utvecklad av Multicaret Inc.');
    }
};
