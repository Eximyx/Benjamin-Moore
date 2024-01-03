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
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('main_image');
            $table->boolean('is_toggled')->default(false);
            $table->longText('content');
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->index('category_id','news_category_idx');
            $table->foreign('category_id','news_category_fk')->references('id')->on('categories');
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_posts');
    }
};
