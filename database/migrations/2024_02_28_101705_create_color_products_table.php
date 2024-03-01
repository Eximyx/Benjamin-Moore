<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('color_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id');

            $table->index('product_id','color_product_product_idx');
            $table->index('color_id','color_product_color_idx');
            $table->foreign('product_id','color_product_product_fk')->on('products')->references('id');
            $table->foreign('color_id','color_product_color_fk')->on('colors')->references('id');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_products');
    }
};
