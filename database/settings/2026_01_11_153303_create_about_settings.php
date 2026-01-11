<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('about.title', 'Om oss');
        $this->migrator->add('about.subtitle', 'Kunskap, kärlek och kvalitet i varje detalj');
        $this->migrator->add('about.content', 'På Edens Gröna skapar vi levande och harmoniska trädgårdsmiljöer där människor trivs. Vi brinner för att förvandla grönska till vackra, funktionella och hållbara utemiljöer – alltid med kunskap, kärlek och kvalitet som ledord.

Med många års erfarenhet inom planering, anläggning och skötsel av trädgårdar ser vi varje projekt som en möjlighet att skapa något unikt. Vi tror på att förena estetik med funktionalitet och hållbarhet, där varje utemiljö utformas för att ge glädje och trivsel under lång tid. Oavsett om det handlar om en liten trädgård eller en större grön yta, skapar vi platser som inspirerar och ger en känsla av harmoni.

För oss handlar trädgårdsdesign inte bara om att plantera växter – det är en konst att förstå naturens dynamik och skapa en balans mellan färg, form och funktion. Genom att arbeta med noggrant utvalda material och växter anpassade för det nordiska klimatet ser vi till att varje projekt blir både vackert och långsiktigt hållbart.

Vår passion är att förvandla idéer till verklighet – med omsorg, precision och ett öga för detaljer.

Kontakta oss idag för en kostnadsfri konsultation, och låt oss tillsammans skapa den oas du alltid drömt om!');
        $this->migrator->add('about.image_path', 'about/about-us-image.jpeg');
    }
};
