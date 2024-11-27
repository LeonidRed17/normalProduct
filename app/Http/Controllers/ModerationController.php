<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;

class ModerationController extends Controller
{
   
    public function moderation()
    { 
        $users = new User();
        $allUsers = $users->getUsers()->keyBy('id');
        $products = new Products();
        $allProducts = $products->showAllProducts();

        //return view('products', ['products' => $allProducts, 'shops' => $shops->all()]);

        // Логика для отображения страницы модерации
        return view('moderation',['products' => $allProducts,'users' => $allUsers]);
    }

}