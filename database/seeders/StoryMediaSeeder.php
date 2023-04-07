<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\StoryMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoryMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $story_ids = Story::all()->pluck('story_id');
        $paths = [
            'storage/StoryMedia/Animal-welfare-&-save-birds-campaign.png',
            'storage/StoryMedia/CSR-initiative-stands-for-Coffee--and-Farmer-Equity-2.png',
            'storage/StoryMedia/Education-Supplies-for-Every--Pair-of-Shoes-Sold-1.png',
            'storage/StoryMedia/Grow-Trees-On-the-path-to-environment-sustainability-4.png',
            'storage/StoryMedia/Nourish-the-Children-in--African-country-1.png',
            'storage/StoryMedia/Plantation-and-Afforestation-programme-1.png',
            'storage/StoryMedia/image.png',
            'storage/StoryMedia/img22.png',
            'storage/StoryMedia/img33.png',
        ];
        foreach ($story_ids as $story_id) {
            for ($i=5; $i > 0; $i--) {
                StoryMedia::create([
                    'story_id' => $story_id,
                    'type' => 'png',
                    'path' => fake()->randomElement($paths),
                ]);
            }
        }
    }
}
