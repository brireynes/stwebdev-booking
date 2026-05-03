<?php

namespace Database\Seeders;

use App\Models\HomepageImage;
use Illuminate\Database\Seeder;

class HomepageImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'key' => 'hero_banner',
                'title' => 'Hero Banner',
                'image' => 'images/home-hero.png',
            ],
            [
                'key' => 'services_card',
                'title' => 'Services Card',
                'image' => 'images/home-services.png',
            ],
            [
                'key' => 'packages_card',
                'title' => 'Packages Card',
                'image' => 'images/home-packages.png',
            ],
            [
                'key' => 'promos_card',
                'title' => 'Promos Card',
                'image' => 'images/home-promos.png',
            ],
            [
                'key' => 'cta_banner',
                'title' => 'CTA Banner',
                'image' => 'images/home-cta.png',
            ],
        ];

        foreach ($images as $image) {
            HomepageImage::updateOrCreate(
                ['key' => $image['key']],
                $image
            );
        }
    }
}