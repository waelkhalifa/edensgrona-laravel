<?php

namespace Database\Seeders;

use App\Models\ProcessStep;
use Illuminate\Database\Seeder;

class ProcessStepSeeder extends Seeder
{
    public function run(): void
    {
        $steps = [
            [
                'step_number' => 1,
                'title' => 'Kontakta oss',
                'description' => 'Hör av dig via telefon eller e-post och berätta kort om dina behov och önskemål för din trädgård. Vi hjälper dig att hitta den bästa lösningen!',
            ],
            [
                'step_number' => 2,
                'title' => 'Kostnadsfritt hembesök',
                'description' => 'Vi bokar in ett kostnadsfritt besök där vi tillsammans går igenom din trädgård. Här får du möjlighet att visa och förklara exakt vad du vill ha gjort, och vi ger professionella råd för bästa resultat.',
            ],
            [
                'step_number' => 3,
                'title' => 'Skräddarsytt förslag',
                'description' => 'Efter besöket tar vi fram en detaljerad plan med upplägg, ritningar och en transparent offert med tydliga kostnader.',
            ],
            [
                'step_number' => 4,
                'title' => 'Utförande av arbetet',
                'description' => 'När du godkänt offerten planerar vi en tid som passar dig. Vårt team av trädgårdsexperter ser till att arbetet utförs noggrant och med högsta kvalitet.',
            ],
            [
                'step_number' => 5,
                'title' => 'Faktura med RUT-avdrag',
                'description' => 'Efter att arbetet är slutfört får du en faktura, där eventuellt RUT-avdrag redan är inkluderat om du är berättigad till det.',
            ],
        ];
        
        foreach ($steps as $step) {
            ProcessStep::create([
                'step_number' => $step['step_number'],
                'title' => $step['title'],
                'description' => $step['description'],
                'icon' => null,
                'is_active' => true,
            ]);
        }
    }
}
