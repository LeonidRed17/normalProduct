<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;


class Products extends Model
{
    public function publicationStatus()
    {
        return $this->belongsTo(PublicationStatus::class, 'status', 'status_name');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function showAllProducts()
    {
        $products = DB::table('products')

            ->join('shops', 'products.shop', '=', 'shops.shop_name')
            ->join('categories', 'products.product_category', '=', 'categories.category_name')
            ->join('subcategories', 'products.product_subcategory', '=', 'subcategories.subcategory_name')
            ->join('quality', 'products.product_quality', '=', 'quality.quality_name')
            ->select('products.*')
            ->get();

        return $products;
    }
    use HasFactory;
}
