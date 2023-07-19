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
            $table->id();
            $table->string('size' , 45);
            $table->string('color' , 45);
            $table->integer('amount');
            $table->string('person_name' , 100);
            $table->string('phone' , 100);
            $table->string('address' , 100);
            $table->integer('status')->default(0);
            $table->string('discount')->default("0")->nullable();
            $table->foreignId('product_id');
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
