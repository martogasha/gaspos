<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('product_amount');
            $table->integer('product_full_quantity')->nullable();
            $table->integer('product_empty_quantity')->nullable();
            $table->integer('product_quantity')->nullable();
            $table->string('product_date')->nullable();
            $table->mediumText('product_image')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
