<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryName = $this->faker->name();
        return [
            'parent_id' => 2,
            'name' => $categoryName,
            'slug' => Str::slug($categoryName),
            'meta_title' => $this->faker->text(160),
            'meta_keyword' => $this->faker->text(32),
            'meta_description' => $this->faker->text(160),
        ];
    }
}
