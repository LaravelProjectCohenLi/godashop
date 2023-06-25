<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = Customer::all();                       // get all customers data

        foreach($customers as $customer){
            $order = Order::factory()->count(1)->create([
                'customer_id' => $customer->id,
                'customer_name' => $customer->name,
                'customer_phone' => $customer->phone,
            ]);         //  Mỗi lần chạy qua 1 khách hàng tạo 1 order

            $products = Product::inRandomOrder()->limit(10)->get();               // get random to 10 product

            foreach($products as $product){           // Mỗi orderdetail sẽ có thông tin của 1 product
                $order->first()->orderDetail()->save(new OrderDetail(
                    [
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'product_price' => $product->price,
                        'quantity' => 1,
                    ]
                ));
            }                    
        }
    }
}
