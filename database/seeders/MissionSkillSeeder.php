<?php

namespace Database\Seeders;

use App\Models\Mission;
use App\Models\MissionSkill;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ids = Mission::all()->pluck('mission_id');
        $skills_id = Skill::all()->pluck('skill_id');
        foreach($ids as $id){
            MissionSkill::create([
                'mission_id' => $id,
                'skill_id' => fake()->randomElement($skills_id),
            ]);
        }
    }
}
