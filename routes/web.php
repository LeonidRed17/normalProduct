<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;

Route::get('/', [MainController::class, "home"])->name("home");
Route::get('/about', [MainController::class, "about"])->name("about");
Route::get('/products', [MainController::class, "show_products"])->name("show_products");
Route::get('/add_product', [MainController::class, "add_product"])->name("add_product");
Route::get('/shops', [MainController::class, "shops"])->name('shops');
Route::post('/products/check', [MainController::class, "products_check"])->name('products_check');
Route::get('/products/{id}', [MainController::class, "show_product"])->name('show_product');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
