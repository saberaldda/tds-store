<?php
 
namespace App\Providers;
 
use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\CountryPolicy;
use App\Policies\OrderPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Product::class  => ProductPolicy::class,
        User::class     => UserPolicy::class,
        Role::class     => RolePolicy::class,
        Country::class  => CountryPolicy::class,
        Order::class    => OrderPolicy::class,
        
    ];
 
    /**
     * Register any application authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
    }
}