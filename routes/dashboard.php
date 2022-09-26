<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\RatingsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Admin
Route::prefix('admin')
    ->middleware(['auth', 'auth.type:super-admin,admin'])
    ->group(function () {

            // Dashboard
        Route::get('/dashboard', function () {
            return view('layouts.admin');
        })->name('dashboard');

            // contact-us
        Route::controller(ContactController::class)
            ->withoutMiddleware(['auth.type:super-admin,admin'])
            ->group(function () {
                Route::get('/contact-us', 'index')->name('contact.index');
                Route::post('/contact-us', 'store')->name('contact.store');
        });

            // categories
        Route::controller(CategoriesController::class)
            ->group(function () {
                Route::get('/categories/trash', 'trash')->name('categories.trash');
                Route::put('/categories/trash/{category?}', 'restore')->name('categories.restore');
                Route::delete('/categories/trash/{category?}', 'forceDelete')->name('categories.force-delete');
                Route::post('/categories/status/{category}', 'changeStatus')->name('categories.change-status');
                Route::resource('/categories', CategoriesController::class);
            });

            // prodcuts
        Route::controller(ProductsController::class)
            ->group(function () {
                Route::get('/products/trash', 'trash')->name('products.trash');
                Route::put('/products/trash/{product?}', 'restore')->name('products.restore');
                Route::delete('/products/trash/{product?}', 'forceDelete')->name('products.force-delete');
                Route::post('/products/status/{product}', 'changeStatus')->name('products.change-status');
                Route::resource('/products', ProductsController::class);
            });

            // Roles
        Route::controller(RolesController::class)
            ->group(function () {
                Route::get('/roles/{role}/assign', 'assign')->name('roles.assign-user');
                Route::put('/roles/assign/{role?}', 'save')->name('roles.save-assign');
                Route::resource('/roles', RolesController::class);
            });

            // User Managment
        Route::controller(UsersController::class)
            ->group(function () {
                Route::get('/users/trash', 'trash')->name('users.trash');
                Route::put('/users/trash/{product?}', 'restore')->name('users.restore');
                Route::delete('/users/trash/{product?}', 'forceDelete')->name('users.force-delete');
                Route::resource('/users', UsersController::class);
            });

            // Countries
        Route::controller(CountriesController::class)
            ->group(function () {
                Route::resource('/countries', CountriesController::class)->except(['show','edit','update']);
            });
            
            // Ratings
        Route::controller(RatingsController::class)
        ->group(function () {
            Route::get('ratings/','index')->name('ratings.index');
            Route::get('ratings/{type}/create','create')->where('type', 'product|profile')->name('ratings.create');
            Route::post('ratings/{type}','store')->where('type', 'product|profile')->name('ratings.store');
        });
        
            // Notification
        Route::controller(NotificationsController::class)
        ->group(function () {
            Route::get('notifications', 'index')->name('notifications');
            Route::get('notifications/{id}', 'show')->name('notifications.read');
            Route::delete('notifications/{id}', 'delete')->name('notifications.delete');
        });
        
            // Orders
        Route::controller(OrdersController::class)
        ->group(function () {
            Route::post('/orders/status/{order}', 'changeStatus')->name('orders.change-status');
            Route::resource('/orders', OrdersController::class)->except('store','update');
        });

    });