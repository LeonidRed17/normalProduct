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
        Schema::table('products', function (Blueprint $table) {

            $table->string('author')->nullable(); // Поле для автора
            $table->string('city')->nullable();   // Поле для города
            $table->string('status')->nullable(); // Поле для статуса  //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['author', 'city', 'status']); // Удаление полей при откате миграции
        });
    }
};
