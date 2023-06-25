<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        foreach($categories as $category){
            // Product::factory()->count(20)->create(['category_id' => 1]);    // add one rows data
            Product::factory()->count(20)->create(['category_id' => $category->id]);        // add category_id is 20 rows
            // Product::factory()->count(20)->create();
        }
    }
}
