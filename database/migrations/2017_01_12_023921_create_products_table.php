<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->double('price', 15, 2)->unsigned();
            $table->integer('quantity')->unsigned()->default(0);
            $table->integer('discount')->unsigned()->default(0);
            $table->integer('point_rate')->unsigned()->default(0);
            $table->text('description');
            $table->tinyInteger('status');
            $table->integer('category_id')->unsigned();
            $table->integer('shop_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            
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
        Schema::dropIfExists('products');
    }
}
