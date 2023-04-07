<?php

namespace Database\Seeders;

use App\Models\Mission;
use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as  Faker;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        $mission_ids = Mission::all()->pluck('mission_id');
        $user_ids = User::all()->pluck('user_id');
        for($i=1; $i<=50; $i++){
            Story::create([
                'mission_id' => fake()->randomElement($mission_ids),
                'user_id' => fake()->randomElement($user_ids),
                'status' => fake()->randomElement(['PENDING','PUBLISHED','DECLINED']),
                'published_at' => fake()->date(),
                'title' => fake()->words(5,true),
                'description' => fake()->words(50,true),
            ]);
        }
    }
}
