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
            $table->id('id_order');
            $table->unsignedBigInteger('customer_id');
            $table->text('address',245);
            $table->float('amount_order',8,2);
            $table->timestamp('deliver_date', $precision = 0);
            $table->string('way_to_pay',30);
            $table->float('change',8,2);
            $table->integer('status');
            $table->text('observation_order')->nullable();            

            $table->foreign('customer_id')
                ->references('id_customer')->on('customers')
                ->onDelete('cascade');
            
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
