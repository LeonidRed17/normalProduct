<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('author')->nullable()->change(); // Делаем поле `author` числовым

            // Добавляем внешний ключ
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Удаляем внешний ключ
            $table->dropForeign(['author']);
        });
    }
}
