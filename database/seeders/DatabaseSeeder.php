<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Mission;
use App\Models\MissionMedia;
use App\Models\StoryInvite;
use App\Models\StoryMedia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            // CountrySeeder::class,
            // CitySeeder::class,
            // SkillSeeder::class,
            // StoryInviteSeeder::class,
            // StoryMediaSeeder::class,
            // StorySeeder::class, mmmmmmmm
            MissionRatingSeeder::class,
            // MissionThemeSeeder::class,
            // MissionSkillSeeder::class,
            // MissionMediaSeeder::class,
            // MissionSeeder::class,
            // UserSeeder::class,
            // MissionSeeder::class,
            // GoalMissionSeeder::class,
            // CommentSeeder::class,  in which text field not availabe in database
            // MissionApplicationSeeder::class,

        ]);
    }
}
