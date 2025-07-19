<?php

namespace App\Services;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsService
{

    public function index(int $productsPerPage)
    {
        return Products::with('user')->join('shops', 'products.shop', '=', 'shops.shop_name')
            ->join('categories', 'products.product_category', '=', 'categories.category_name')
            ->join('subcategories', 'products.product_subcategory', '=', 'subcategories.subcategory_name')
            ->join('quality', 'products.product_quality', '=', 'quality.quality_name')
            ->select('products.*')
            ->where('status', '=', 'published')->paginate($productsPerPage);


    }
    public function show($id)
    {
        return Products::where('id', '=', $id)->get();
    }
    public function create()
    {
        return Products::join('shops', 'products.shop', '=', 'shops.shop_name')
            ->join('categories', 'products.product_category', '=', 'categories.category_name')
            ->join('subcategories', 'products.product_subcategory', '=', 'subcategories.subcategory_name')
            ->join('quality', 'products.product_quality', '=', 'quality.quality_name')
            ->select('products.*')
            ->get();
    }
    public function validation(Array $productData)
    {
        return $productData->validate([
            'product_name' => 'required|min:2|max:100',
            'product_description' => 'required|min:2|max:100',
            'message' => 'required|min:5|max:300',
            'product_price' => 'required|min:1|max:10',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'product_category' => 'required|min:1|max:30',
            'product_subcategory' => 'required|min:1|max:30',
            'shop' => 'required|min:1|max:30',
            'product_quality' => 'required|min:1|max:10'
        ]);
    }
    public function store()
    {

    }


    }
