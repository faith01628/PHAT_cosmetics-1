<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Product;
use App\Services\PermissionGateAndPolicyAccess;
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
        // Define permission
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();
        $permissionGateAndPolicy->setGateAndPolicyAccess();
        

    }


        









}



// Gate::define('menu-list', function($user) {
        //     dd($user);
        //     return $user->checkPermissionaccess('Menus_List');
        // }); 

        // //This is a demo. Can be optimized in update policy configuration
        // Gate::define('product-edit', function($user, $id) {
        //     $product = Product::find($id);
        //     if ($user->checkPermissionaccess('Products_Edit') && $user->id === $product->user_id) {
        //         return true;    
        //     }
        //     return false;
        // }); 


        // Gate::define('product-list', function($user) {
        //     return $user->checkPermissionaccess('Products_List');
        // }); 


        // Manual declaration
        // Gate::define('category-delete', function($user) {
        //     return $user->checkPermissionaccess('Categories_Delete');
        // });
