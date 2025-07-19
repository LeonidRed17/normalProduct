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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('product_name');
            $table->string('product_description');
            $table->text('product_message');
            $table->integer('product_price');
            $table->string('product_category')->index('products_category_fk');
            $table->string('product_subcategory')->index('products_subcategory_fk');
            $table->string('product_quality')->index('products_quality_fk');
            $table->string('shop')->index('products_shop_fk');
            $table->string('product_image', 40)->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->index('products_author_foreign');
            $table->string('city')->nullable();
            $table->string('status')->nullable()->index('products_status_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
