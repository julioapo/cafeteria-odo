<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companion_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('companion_id_companion');
            $table->unsignedBigInteger('product_id_product');

            $table->foreign('companion_id_companion')->references('id_companion')->on('companions')
                ->onDelete('cascade');
            $table->foreign('product_id_product')->references('id_product')->on('products')
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
        Schema::dropIfExists('companion_product');
    }
}
