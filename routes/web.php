<?php

use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('products', ProductController::class);

    Route::get('categories/sub', function () {
        $input = request('option');
        $main_cat = Category::find($input);
        return $sub_cats = $main_cat->categories()->get(['id','name']);
        return $sub_cats->toJson();
    });
});

require __DIR__ . '/auth.php';
