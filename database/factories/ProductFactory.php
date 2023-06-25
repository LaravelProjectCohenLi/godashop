<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productName = $this->faker->name();
        return [
            'name' => $productName,
            'barcode' => $this->faker->ean13(),
            'sku' => $this->faker->numberBetween(),
            'price' => $this->faker->randomFloat(),
            'sale_price' => $this->faker->randomFloat(),
            'description' => $this->faker->realText(),
            'content' => $this->faker->realText(1000),
            'is_feature' => array_rand([true, false]),
            'order' => 0,
            'slug' => Str::slug($productName),
            'meta_title' => $this->faker->realTextBetween(),
            'meta_keyword' => $this->faker->realTextBetween(),
            'meta_description' => $this->faker->realTextBetween(),
        ];
    }
}
