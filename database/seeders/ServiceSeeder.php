<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Planering, design och anläggning',
                'order' => 1,
                'image' => 'card.1.jpg',
                'description' => 'Professionell planering och design av din drömträdgård från start till mål.'
            ],
            [
                'title' => 'Stenssättning',
                'order' => 2,
                'image' => 'card-2.jpg',
                'description' => 'Expertis inom stenläggning för gångar, terrasser och murar.'
            ],
            [
                'title' => 'Häckklippning',
                'order' => 3,
                'image' => 'card-3.jpg',
                'description' => 'Professionell häckklippning för en välvårdad trädgård.'
            ],
            [
                'title' => 'Frukträdsbeskärning',
                'order' => 4,
                'image' => 'card-4.jpg',
                'description' => 'Expertbeskärning av fruktträd för optimal tillväxt och skörd.'
            ],
            [
                'title' => 'Gräsmatta',
                'order' => 5,
                'image' => 'card-5.jpg',
                'description' => 'Anläggning och skötsel av gräsmattor för en grön och frodig trädgård.'
            ],
            [
                'title' => 'Skötsel',
                'order' => 6,
                'image' => 'card-6.jpg',
                'description' => 'Regelbunden trädgårdsskötsel för att hålla din trädgård i toppskick.'
            ],
            [
                'title' => 'Trädfällning',
                'order' => 7,
                'image' => 'card-7.jpg',
                'description' => 'Säker och professionell trädfällning med erfaret team.'
            ],
            [
                'title' => 'Grävning',
                'order' => 8,
                'image' => 'card-8.jpg',
                'description' => 'Grävarbeten för dränering, plantering och anläggning.'
            ],
            [
                'title' => 'Stubbfräsning',
                'order' => 9,
                'image' => 'card-9.jpg',
                'description' => 'Effektiv borttagning av stubbar för en ren och användbar yta.'
            ],
            [
                'title' => 'Plantering',
                'order' => 10,
                'image' => 'card-10.jpg',
                'description' => 'Professionell plantering av träd, buskar och växter.'
            ],
            [
                'title' => 'Häckplantering',
                'order' => 11,
                'image' => 'card-11.jpg',
                'description' => 'Plantering av häckar för avskildhet och gröna gränser.'
            ],
            [
                'title' => 'Högtryckstvätt med varmvatten',
                'order' => 12,
                'image' => 'card-12.jpg',
                'description' => 'Effektiv rengöring av ytor med professionell högtryckstvätt.'
            ],
        ];

        foreach ($services as $serviceData) {
            // Create the service
            $service = Service::create([
                'title' => $serviceData['title'],
                'icon' => null,
                'description' => $serviceData['description'] ?? null,
                'order' => $serviceData['order'],
                'is_active' => true,
            ]);

            // Add image from existing file
            $imagePath = public_path('assets/img/'.$serviceData['image']);

            if (File::exists($imagePath)) {
                $service->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('image');

                $this->command->info("✓ Image added for: {$service->title}");
            } else {
                $this->command->warn("✗ Image not found: {$imagePath}");
            }
        }

        $this->command->info('Services seeded successfully!');
    }
}
