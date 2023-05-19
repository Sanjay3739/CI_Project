<?php

namespace Database\Factories;

use Carbon\Traits\ToStringFormat;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mission>
 */
class MissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countries = Country::All()->pluck('country_id')->toArray();
        $country = $this->faker->randomElement($countries);
        $cities = City::Where('country_id',$country)->pluck('city_id');

        return [
            'theme_id' => $this->faker->numberBetween(1,100),
            'title' => $this->faker->words(4,true),
            'short_description' => $this->faker->words(10,true),
            'description' => $this->faker->sentence(3),
            'mission_type' => $this->faker->randomElement(['GOAL','TIME']),
            'status'=> $this->faker->numberBetween(0,1),
            'country_id'=> $country,
            'city_id'=>$this->faker->randomElement($cities),
        ];
    }
}
