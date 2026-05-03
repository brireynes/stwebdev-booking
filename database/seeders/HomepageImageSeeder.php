<?php

namespace Database\Seeders;

use App\Models\HomepageImage;
use Illuminate\Database\Seeder;

class HomepageImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['key' => 'hero_banner', 'title' => 'Hero Banner'],
            ['key' => 'services_card', 'title' => 'Services Card'],
            ['key' => 'packages_card', 'title' => 'Packages Card'],
            ['key' => 'promos_card', 'title' => 'Promos Card'],
            ['key' => 'cta_banner', 'title' => 'CTA Banner'],
        ];

        foreach ($images as $image) {
            HomepageImage::updateOrCreate(
                ['key' => $image['key']],
                $image
            );
        }
    }
}