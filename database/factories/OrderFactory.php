<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->numberBetween(),
            'status' => Order::STATUS['created'],
            'shipping_address' => $this->faker->address(),
            'shipping_fee' => $this->faker->randomFloat(),
            'payment_method_id' => 1,
        ];
    }
}
