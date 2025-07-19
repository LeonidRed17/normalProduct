<?php

namespace App\Services;

use App\Models\Products;

class SearchService
{
    public function index($query)
    {
            return Products::where('status', '=', 'published')->where('product_name', 'LIKE', '%' . $query . '%')->paginate(6);
    }
}
