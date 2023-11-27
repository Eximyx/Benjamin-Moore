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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
//            $table->string('description')->nullable();
//            $table->string('type');
//            $table->string('colors');
//            $table->string('img');
//            $table->string('base');
//            $table->string('V of dry remain');
//            $table->string('time_to_repeat');
//            $table->string('consumption');
//            $table->string('thickness');
            $table->boolean('kind_of_work');
            $table->unsignedBigInteger('category_id');
            $table->index('category_id','post_category_idx');
            $table->foreign('category_id','post_category_fk')->references('id')->on('categories');
//            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
