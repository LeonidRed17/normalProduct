<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SearchService;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
        
    }
    public function productsSearch(Request $request)
    {

        $query = trim($request->input('query'));
        
        if (empty($query)) {
            
            return response('Пустой запрос', 400);
        
        } else {
            
            $products = $this->searchService->index($query);

            return view('products.product_search', compact('products', 'query'));
        }
    }
}
