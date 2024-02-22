<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email')->default('sales@benjaminmoore.by');
            $table->string('phone')->default('+375 (29) 608-40-00');
            $table->string('work_time')->default('Работаем ПН — ПТ, 10:00 — 19:00');
            $table->string('location')->default('Официальный салон красок Benjamin Moore Республика Беларусь, г. Минск,ул. Восточная, д. 41');
            $table->string('instagram')->default('@benjaminmoore.by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
