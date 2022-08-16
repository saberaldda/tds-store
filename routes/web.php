<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RolesController;
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

require __DIR__.'/auth.php';

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('layouts.admin');
        })->name('dashboard');

        Route::controller(CategoriesController::class)
            ->group(function () {
                Route::get('/categories/trash', 'trash')->name('categories.trash');
                Route::put('/categories/trash/{category?}', 'restore')->name('categories.restore');
                Route::delete('/categories/trash/{category?}', 'forceDelete')->name('categories.force-delete');
                Route::resource('/categories', CategoriesController::class);
            });

        Route::controller(ProductsController::class)
            ->group(function () {
                Route::get('/products/trash', 'trash')->name('products.trash');
                Route::put('/products/trash/{product?}', 'restore')->name('products.restore');
                Route::delete('/products/trash/{product?}', 'forceDelete')->name('products.force-delete');
                Route::resource('/products', ProductsController::class);
            });

        Route::controller(RolesController::class)
            ->group(function () {
                Route::get('/roles/{role}/assign', 'assign')->name('roles.assign-user');
                Route::put('/roles/assign/{role?}', 'save')->name('roles.save-assign');
                Route::resource('/roles', RolesController::class);
            });

        // Route::resource('/countries', 'CountriesController');
    });