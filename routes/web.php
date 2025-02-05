<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModerationController;

Route::get('/', [MainController::class, "home"])->name("home");
Route::get('/about', [MainController::class, "about"])->name("about");
Route::get('/shops', [MainController::class, "shops"])->name('shops');
Route::get('/news', [MainController::class, "news"])->name("news");

Route::get('/search', [MainController::class, "search"])->name('search');
Route::get('/product/{id}', [MainController::class, "show_product"])->name('show_product');

Route::controller(MainController::class)->group(function () {
    Route::get('/products', 'show_products')->name('show_products');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add_product', [MainController::class, "add_product"])->name("add_product");
    Route::post('/products/check', [MainController::class, "products_check"])->name('products_check');
});

Route::middleware(['auth', 'admin'])->name('moderation.')->group(function () {
    Route::get('/moderation', [ModerationController::class, 'moderation'])->name('moderation');
    //Route::delete('/moderation', [ModerationController::class, 'delete'])->name('delete');
    Route::get('/moderation/published', [ModerationController::class, 'published'])->name('published');
    Route::get('/moderation/unpublished', [ModerationController::class, 'unpublished'])->name('unpublished');
    Route::get('/moderation/archive', [ModerationController::class, 'archive'])->name('archive');

    Route::post('/moderation/check', [ModerationController::class, 'moderation_check'])->name('check');
});

require __DIR__ . '/auth.php';
