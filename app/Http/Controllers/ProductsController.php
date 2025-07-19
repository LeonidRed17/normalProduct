<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Shops;
use App\Models\Categories;
use App\Models\Subcategories;
use Illuminate\Support\Facades\DB;
use App\Models\Quality;
use App\Models\User;

use App\Services\ProductsService;

class ProductsController extends Controller

{
    private $products;
    private $product;
    public function __construct(
        private ProductsService $productsService,
        private Shops $shops,
        private Categories $categories,
        private Subcategories $subcategories,
        private Quality $qualities
    ) {
        $this->productsService = new ProductsService();
        $this->shops = new Shops();
        $this->categories = new Categories();
        $this->subcategories = new Subcategories();
        $this->qualities = new Quality();
    }
    public function show_products()
    {
        $productsPerPage = 3;

        $this->products = $this->productsService->index($productsPerPage);

        return view('products.products', [
            'products' => $this->products,
            'shops' => $this->shops->all(),
            'categories' => $this->categories->all(),
            'subcategories' => $this->subcategories->all(),
            'qualities' => $this->qualities->all()
        ]);

    }

    public function show_product($id) : object
    {
        $this->product = $this->productsService->show($id);

        return view('products.product', ['product' => $this->product]);

    }

    public function create()
    {
        $this->products = $this->productsService->create();

        return view('products.add_product', [
            'products' => $this->products,
            'shops' => $this->shops->all(),
            'categories' => $this->categories->all(),
            'subcategories' => $this->subcategories->all(),
            'qualities' => $this->qualities->all()
        ]);
    }
    public function store(Request $request)
    {
        $productData = $request->only([
            'product_name',
            'product_description',
            'message',
            'product_price',
            'product_category',
            'product_subcategory',
            'shop',
            'product_quality'
        ]);
            /*
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
        ]);*/
        dd($this->productsService->validation($productData));


        $this->product->product_name = $request->input('product_name');
        $this->product->product_description = $request->input('product_description');
        $this->product->product_message = $request->input('message');
        $this->product->product_price = $request->input('product_price');

        $product_image = $request->file('product_image');
        if ($product_image) {
            $rawimageName = $this->product->product_name . time() . '.' . $product_image->getClientOriginalExtension();
            $imageName = str_replace(['.', ',', '!', '?', '"', '\'', ' '], '', $rawimageName);
            $product_image->move(public_path('images/products'), $imageName);
            $this->product->product_image = $imageName;
        }


        $this->product->product_category = $request->input('product_category');
        $this->product->product_subcategory = $request->input('product_subcategory');
        $this->product->shop = $request->input('shop');
        $this->product->product_quality = $request->input('product_quality');
        $this->product->status = "unpublished"; //unpublished, попадает на модерацию после загрузки
        $this->product->user_id = auth()->id();

        //dd($product);
        $this->product->save();

        return redirect('/products');
    }

    public function filter(Request $request)
    {

        //dd($request);$query = Product::query();
        $query = Products::query();


        $selectedCategory = $request->query('selectedCategory');
        $selectedSubcategory = request('selectedSubcategory');
        $minPrice = $request->query('minPrice');
        $maxPrice = $request->query('maxPrice');
        $sortPriceFromTo = $request->query('sortPriceFromTo');

        if (!is_null($selectedCategory)) {
            $query->where('product_category', $selectedCategory);
        }

        if (!is_null($selectedSubcategory)) {
            $query->where('product_subcategory', $selectedSubcategory);
        }

        if (!is_null($minPrice)) {
            $query->where('product_price', '>=', $minPrice);
        }

        if (!is_null($maxPrice)) {
            $query->where('product_price', '<=', $maxPrice);
        }

        if (!is_null($sortPriceFromTo)) {
            if ($sortPriceFromTo === 'cheaper') {
                $query->orderBy('product_price', 'asc');
            } elseif ($sortPriceFromTo === 'more_expensive') {
                $query->orderBy('product_price', 'desc');
            }
        }


        //$products = Products::where('status', '=', 'published')->where('product_category', '=', $selectedCategory)
        //  ->where('product_subcategory', '=', $selectedSubcategory)->get ();
        //->paginate(6)
        $products = $query->where('status', '=', 'published')->paginate(6);


        return response()->json($products);

        //return response()->json($products->get());
    }
}
