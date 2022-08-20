<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Product;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->defineGateCategory();
   


        Gate::define('menu-list', function($user) {
            return $user->checkPermissionaccess('Menus_List');
        }); 

        //This is a demo. Can be optimized in update policy configuration
        Gate::define('product-edit', function($user, $id) {
            $product = Product::find($id);
            if ($user->checkPermissionaccess('Products_Edit') && $user->id === $product->user_id) {
                return true;    
            }
            return false;
        }); 


        Gate::define('product-list', function($user) {
            return $user->checkPermissionaccess('Products_List');
        }); 



    }

        public function defineGateCategory() {
            Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
            Gate::define('category-create', 'App\Policies\CategoryPolicy@create');
            Gate::define('category-update', 'App\Policies\CategoryPolicy@update');
            Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
        }














}
        // Manual declaration
        // Gate::define('category-delete', function($user) {
        //     return $user->checkPermissionaccess('Categories_Delete');
        // });
