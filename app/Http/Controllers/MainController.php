<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Shops;
use App\Models\Categories;
use App\Models\Subcategories;
use Illuminate\Support\Facades\DB;
use App\Models\Quality;
use App\Models\User;

class MainController extends Controller
{
    public function home()
    {
        return view('primary');
    }
    public function about()
    {
        return view('about');
    }
    public function news()
    {
        return view('news');
    }

    public function show_products()
    {
        $shops = new Shops();

        //$products = Products::with('user')->where('status', '=', 'published')->paginate(6);
        $products = Products::with('user')->join('shops', 'products.shop', '=', 'shops.shop_name')
            ->join('categories', 'products.product_category', '=', 'categories.category_name')
            ->join('subcategories', 'products.product_subcategory', '=', 'subcategories.subcategory_name')
            ->join('quality', 'products.product_quality', '=', 'quality.quality_name')
            ->select('products.*')
            ->where('status', '=', 'published')->paginate(6);
        /*
        $products = DB::table('products')
        ->join('shops', 'products.shop', '=', 'shops.shop_name')
        ->join('categories', 'products.product_category', '=', 'categories.category_name')
        ->join('subcategories', 'products.product_subcategory', '=', 'subcategories.subcategory_name')
        ->join('quality', 'products.product_quality', '=', 'quality.quality_name')
        ->select('products.*')
        ->get();*/

        $shops = new Shops();
        $categories = new Categories();
        $subcategories = new Subcategories();
        $qualities = new Quality();

        return view('products', [
            'products' => $products,
            'shops' => $shops->all(),
            'categories' => $categories->all(),
            'subcategories' => $subcategories->all(),
            'qualities' => $qualities->all()
        ]);
        //return view('products', ['products' => $products, 'shops' => $shops->all()]);
    }
    public function show_product($id)
    {
        $product = DB::table('products')->where('id', '=', $id)->get();

        return view('product', ['product' => $product]);
    }
    public function search(Request $request)
    {

        $query = $request->input('query');
        if (isset($query)) {
            $products = Products::where('status', '=', 'published')->where('product_name', 'LIKE', '%' . $query . '%')->paginate(6);
            return view('products.product_search', compact('products', 'query'));
        } else {
            return redirect('/products');
        }
    }
    public function shops()
    {
        $shops = new Shops();
        return view('shops', ['shops' => $shops->all()]);
    }
    public function categories() {}
    public function add_product()
    {
        $products = DB::table('products')
            ->join('shops', 'products.shop', '=', 'shops.shop_name')
            ->join('categories', 'products.product_category', '=', 'categories.category_name')
            ->join('subcategories', 'products.product_subcategory', '=', 'subcategories.subcategory_name')
            ->join('quality', 'products.product_quality', '=', 'quality.quality_name')
            ->select('products.*')
            ->get();

        $shops = new Shops();
        $categories = new Categories();
        $subcategories = new Subcategories();
        $qualities = new Quality();

        return view('add_product', [
            'products' => $products,
            'shops' => $shops->all(),
            'categories' => $categories->all(),
            'subcategories' => $subcategories->all(),
            'qualities' => $qualities->all()
        ]);
    }
    public function products_check(Request $request)
    {


        $valid = $request->validate([
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

        $product = new Products();
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->product_message = $request->input('message');
        $product->product_price = $request->input('product_price');

        $product_image = $request->file('product_image');
        if ($product_image) {
            $rawimageName = $product->product_name . time() . '.' . $product_image->getClientOriginalExtension();
            $imageName = str_replace(['.', ',', '!', '?', '"', '\'', ' '], '', $rawimageName);
            $product_image->move(public_path('images/products'), $imageName);
            $product->product_image = $imageName;
        }


        $product->product_category = $request->input('product_category');
        $product->product_subcategory = $request->input('product_subcategory');
        $product->shop = $request->input('shop');
        $product->product_quality = $request->input('product_quality');
        $product->status = "unpublished"; //unpublished, попадает на модерацию после загрузки
        $product->user_id = auth()->id();

        //dd($product);
        $product->save();

        return redirect('/products');
    }
}
