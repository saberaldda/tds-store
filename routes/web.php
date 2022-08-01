<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

        Route::controller(CategoriesController::class)
            ->group(function () {
                Route::resource('/categories', CategoriesController::class);
                Route::get('/categories/trash', 'trash')->name('categories.trash');
                Route::put('/categories/trash/{id?}', 'restore')->name('categories.restore');
                Route::delete('/categories/trash/{id?}', 'forceDelete')->name('categories.force-delete');
            });

        Route::controller(ProductsController::class)
            ->group(function () {
                Route::resource('/products', ProductsController::class);
                Route::get('/products/trash', 'trash')->name('products.trash');
                Route::put('/products/trash/{id?}', 'restore')->name('products.restore');
                Route::delete('/products/trash/{id?}', 'forceDelete')->name('products.force-delete');
            });

        // Route::resource('/roles', 'RolesController');

        // Route::resource('/countries', 'CountriesController');
    });