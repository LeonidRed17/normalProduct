<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    public function publicationStatus()
    {
        return $this->belongsTo(PublicationStatus::class, 'status', 'status_name');
    }
    function showAllProducts()
    {
        $products = DB::table('products')

            ->join('shops', 'products.shop', '=', 'shops.shop_name')
            ->join('categories', 'products.product_category', '=', 'categories.category_name')
            ->join('subcategories', 'products.product_subcategory', '=', 'subcategories.subcategory_name')
            ->join('quality', 'products.product_quality', '=', 'quality.quality_name')
            ->join('users', 'products.author', '=', 'users.id')
            ->select('products.*')
            ->get();

        return $products;
    }
    use HasFactory;
}
