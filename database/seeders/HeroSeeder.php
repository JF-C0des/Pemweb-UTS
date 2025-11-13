<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'title' => 'We specialize in UI/UX, Web Development, Digital Marketing.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque fringilla magna mauris. Nulla fermentum viverra sem eu rhoncus consequat varius nisi quis, posuere magna.',
            'button_text' => 'Get Started Now',
            'button_link' => '#!',
            'contact_text' => 'Call us (0123) 456 – 789',
            'contact_subtext' => 'For any question or concern',
            'image_main' => 'hero.png',
            'shape_images' => [
                'shape-01.svg',
                'shape-02.svg',
                'shape-03.svg',
                'shape-04.svg'
            ],
            'is_active' => true,
        ]);
    }
}