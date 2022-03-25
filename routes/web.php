<?php

use App\Http\Controllers\V1\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\V1\CartItemNoteController;
use App\Http\Controllers\V1\ItemController;
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

// Route::get('/', function () {
//     return view('store');
// });


// admin
Route::prefix('/admin')->group(function () {
    Route::get('/', []);
});

// customer
Route::prefix('/customer')->group(function () {
    Route::get('/items', [ItemController::class, 'index'])->name('customer.item.index');
});

Route::get('/', [CartController::class, 'index']);

// for admin
Route::prefix('/admin/item')->controller(ItemController::class)->group(function () {
    Route::get('/create', 'create')->name('item.create');
    Route::get('/', 'index')->name('item.index');
    Route::post('/', 'store')->name('item.store');
    Route::get('/{slug}', 'show')->name('item.show');
    Route::put('/{slug}', 'update')->name('item.update');
    Route::delete('/{slug}', 'destroy')->name('item.destory');
});

Route::get('/admin', function () {
    return view('backoffice.app');
});


// for customer
Route::controller(CartController::class)->group(function () {

});

// for customer
Route::prefix('/cart/item')->controller(CartItemNoteController::class)->group(function () {
    Route::post('/{uuid}', 'store')->name('cartitemnote.store');
    Route::get('/', 'index')->name('cartitemnote.index');
    Route::get('/create', 'create')->name('cartitemnote.create');
});

Route::group([
    'namespace' => 'V1',
    'prefix' => 'api/v1',
], function ($router) {
    require(base_path('routes/api.php'));
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
