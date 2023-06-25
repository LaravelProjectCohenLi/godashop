<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->string('code');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->integer('payment_method_id');
            $table->tinyInteger('status')
            ->default(0)
            ->comment('1: Created, 2: In-progress, 3: Delivering, 4: Delivered, 5: Cancel');
            $table->string('shipping_address');
            $table->decimal('shipping_fee', 17)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
