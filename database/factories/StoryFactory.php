<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class StoryFactory extends Factory
{

    public function definition()
    {
        return [
            'category_id' =>(string) Category::query()->inRandomOrder()->first()->id,
            'title'   => $this->faker->paragraph(1),
            'text'    => $this->faker->realText(200).$this->faker->realText(200)
        ];
    }
}
