<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class StoryFactory extends Factory
{

    public function definition()
    {
        return [
            'title'   => $this->faker->paragraph(1),
            'text'    => $this->faker->realText(200).$this->faker->realText(200)
        ];
    }
}
