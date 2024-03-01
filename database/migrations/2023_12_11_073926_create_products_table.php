<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('main_image')->default('1.jpg');
            $table->longText('content');
            $table->integer('code');
            $table->unsignedInteger('price');
            $table->string('gloss_level');
            $table->string('description');
            $table->string('type');
            $table->string('base');
            $table->string('v_of_dry_remain');
            $table->string('time_to_repeat');
            $table->string('consumption');
            $table->string('thickness');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('product_category_id')->nullable();
            $table->index('product_category_id', 'product_product_category_idx');
            $table->foreign('product_category_id', 'product_product_category_fk')->references('id')->on('product_categories');
            $table->boolean('is_toggled')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
