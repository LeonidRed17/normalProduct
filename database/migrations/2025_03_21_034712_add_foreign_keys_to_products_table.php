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
            $table->foreign(['user_id'], 'products_author_foreign')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['product_category'], 'products_category_fk')->references(['category_name'])->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['product_quality'], 'products_quality_fk')->references(['quality_name'])->on('quality')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['shop'], 'products_shop_fk')->references(['shop_name'])->on('shops')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['status'])->references(['status_name'])->on('publicationstatus')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['product_subcategory'], 'products_subcategory_fk')->references(['subcategory_name'])->on('subcategories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_author_foreign');
            $table->dropForeign('products_category_fk');
            $table->dropForeign('products_quality_fk');
            $table->dropForeign('products_shop_fk');
            $table->dropForeign('products_status_foreign');
            $table->dropForeign('products_subcategory_fk');
        });
    }
};
