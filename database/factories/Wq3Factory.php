<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Wq3Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' =>$this->faker->dateTimeThisYear(),
            'start_time' =>$this->faker->time(),
            'stop_time' =>$this->faker->time(),
            'standard_id' =>1,
            'user_id'=>mt_rand(1,3),
            'tss' =>$this->faker->randomFloat(1, 20, 30),
            'ph' =>$this->faker->randomFloat(1, 20, 30),
            'do' =>$this->faker->randomFloat(1, 20, 30),
            'redox' =>$this->faker->randomFloat(1, 20, 30),
            'conductivity'=>$this->faker->randomFloat(1, 20, 30),
            'tds' =>$this->faker->randomFloat(1, 20, 30),
            'temperatur' => $this->faker->randomFloat(1, 20, 30),
            'salinity' =>$this->faker->randomFloat(1, 20, 30),
            'turbidity' =>$this->faker->randomFloat(1, 20, 30),
            'water_condition'=>'Normal',
            'water_color'=>'Normal',
            'smel_of_water'=>'Normal',
            'rain'=>'No',
            'rain_during_sampling'=>'No',
            'oil_layer'=>'No',
            'source_pollution'=>$this->faker->words(3, true),
            'hard_copy'=>$this->faker->imageUrl(360, 360, 'animals', true, 'cats')
        ];
    }
}
