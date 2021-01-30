<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('name_product');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->float('amount_product',8,2);
            $table->integer('state_product')->default(1);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('product_day');
            $table->string('photo_file');
            $table->string('commentary');
            $table->string('slug'); //este es el campo para url amigables
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id_type')->on('types')
                ->onDelete('set null');

            $table->foreign('category_id')
                ->references('id_category')->on('categorys')
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
        Schema::dropIfExists('products');
    }
}
