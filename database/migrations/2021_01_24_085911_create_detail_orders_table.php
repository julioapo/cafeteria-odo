<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->float('amount_product',8,2);
            $table->integer('quantity');
            $table->float('total_amount',8,2);
            $table->text('observation_product');
            $table->timestamps();


            $table->foreign('order_id')
                ->references('id_order')->on('orders')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id_product')->on('products')
                ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pre_orders');
    }
}
