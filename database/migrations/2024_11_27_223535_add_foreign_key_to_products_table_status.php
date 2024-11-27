<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToProductsTableStatus extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('status') // Локальный ключ в таблице products
                  ->references('status_name') // Поле в таблице publication_status
                  ->on('publication_status')
                  ->onUpdate('cascade') // Автообновление ключа при изменении
                  ->onDelete('restrict'); // Запрет удаления связанного статуса
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['status']);
        });
    }
}
