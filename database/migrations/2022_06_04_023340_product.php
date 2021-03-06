<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('inventory_id');
            // $table->unsignedBigInteger('discount_id');
            $table->string('name', 200);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('size_id');
//            $table->string('SKU')->nullable();
            $table->decimal('price',6,2);
            $table->string('desc')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')
                ->on('product_category')->onDelete('cascade');

            // $table->foreign('inventory_id')->references('id')
            //     ->on('product_inventory')->onDelete('cascade');

            // $table->foreign('discount_id')->references('id')
            //     ->on('discount')->onDelete('cascade');

            $table->foreign('brand_id')->references('id')
                ->on('brand')->onDelete('cascade');

            $table->foreign('size_id')->references('id')
                ->on('size')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
