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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('banner_position_id')->unique()->nullable();
            $table->index('banner_position_id', 'banner_banner_positions_idx');
            $table->foreign('banner_position_id', 'banner_banner_positions_fk')->references('id')->on('banner_positions');
            $table->string('content');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
