<?php

namespace Database\Seeders;

use App\Models\Mission;
use App\Models\MissionMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paths = [
            'mission_media/6435266f7ed03.jpeg',
            'mission_media/643525ab949cc.jpeg',
            'mission_media/64353293def77.png',
            'mission_media/643533ab0e725.png',
            'mission_media/643533ead0ab2.png',
            'mission_media/6435342d82b81.png',

        ];
        $mission_ids = Mission::all()->pluck('mission_id');
        foreach ($mission_ids as $mission_id){
            for($i=0;$i<5;$i++){
                if($i==0){
                    $default='1';
                }
                else{
                    $default="0";
                }
                MissionMedia::create([
                    'mission_id' => $mission_id,
                    'default' => $default,
                    'media_name' => fake()->word(),
                    'media_type' => 'png',
                    'media_path' => fake()->randomElement($paths)
                ]);
            }
        }
    }
}
