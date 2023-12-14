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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('main_image');
            $table->longText('content');
            $table->integer('code');
            $table->string('gloss_level');
            $table->string('description');
            $table->string('type');
            $table->string('colors');
            $table->string('base');
            $table->string('v_of_dry_remain');
            $table->string('time_to_repeat');
            $table->string('consumption');
            $table->string('thickness');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('product_category_id');
            $table->index('product_category_id','product_product_category_idx');
            $table->foreign('product_category_id','product_product_category_fk')->references('id')->on('product_categories');
            $table->boolean('is_toggled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
