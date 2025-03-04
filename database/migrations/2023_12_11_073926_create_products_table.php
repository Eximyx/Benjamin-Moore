<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('main_image')->nullable();
            $table->longText('content')->nullable();
            $table->longText('sub_content')->nullable();
            $table->integer('code')->nullable();
            $table->unsignedInteger('price');
            $table->string('gloss_level')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('base')->nullable();
            $table->string('v_of_dry_remain')->nullable();
            $table->string('time_to_repeat')->nullable();
            $table->string('consumption')->nullable();
            $table->string('thickness')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('product_category_id')->nullable()->constrained('product_categories');
            $table->boolean('is_toggled')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
