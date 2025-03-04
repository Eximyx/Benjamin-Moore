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
        Schema::create('news_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('user_name')->default("news.moder");
            $table->string('main_image')->nullable();
            $table->boolean('is_toggled')->default(false);
            $table->longText('content');
            $table->longText('description');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('news_posts');
    }
};
