<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id_customer');
            $table->string('first_name_customer');
            $table->string('last_name_customer');
            $table->date('birth_date_customer');
            $table->string('cell_phone_customer');
            $table->text('addres_customer');
            $table->string('password_customer');
            $table->string('email_customer')->unique();
            $table->text('observations_customer')->nullable();
            $table->integer('alert_customer')->default(0);            
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
        Schema::dropIfExists('customers');
    }
}
