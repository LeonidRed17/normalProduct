<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProductsStatus extends Migration
{
    public function up()
    {
        // Внесение изменений в таблицу publication_status
        Schema::table('publicationstatus', function (Blueprint $table) {
            $table->string('status_name')->unique()->change(); // Убедимся, что поле уникальное
        });

        // Внесение изменений в таблицу products
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('status') // Добавляем внешний ключ
                  ->references('status_name') // Ссылаемся на поле status_name
                  ->on('publicationstatus') // Таблица для связи
                  ->onUpdate('cascade') // Каскадное обновление
                  ->onDelete('restrict'); // Ограничение на удаление
        });
    }

    public function down()
    {
        // Удаление внешнего ключа из таблицы products
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['status']); // Удаляем внешний ключ
        });

        // Возвращаем изменения в таблице publication_status
        Schema::table('publicationstatus', function (Blueprint $table) {
            $table->dropUnique(['status_name']); // Убираем уникальность
        });
    }
}