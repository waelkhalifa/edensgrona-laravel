<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.site_title', 'Edens Gröna');
        $this->migrator->add('general.google_reviews_url',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2644.3086105058374!2d13.168447677259033!3d55.64597457304479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa4f8a612dc5e96cd%3A0x666c6322a1976529!2sEdens%20Gr%C3%B6na%20Tr%C3%A4dg%C3%A5rdsservice%20AB!5e1!3m2!1sen!2sae!4v1743832848960!5m2!1sen!2sae');
        $this->migrator->add('general.postal_address', 'Per Anders väg 1 24561 Staffanstorp');
        $this->migrator->add('general.visiting_address', 'Tirupsvägen 99, 245 93 Staffanstorp');
        $this->migrator->add('general.footer_text', '© 2025 - Utvecklad av Multicaret Inc.');
    }
};
