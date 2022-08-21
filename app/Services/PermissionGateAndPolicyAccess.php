<?php 

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {
    
    public function setGateAndPolicyAccess() {

        $this->defineGateCategory();
        $this->defineGateBrand();
        $this->defineGateProduct();

        
    }

    public function defineGateCategory() {
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-create', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-edit', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
    }
    
    public function defineGateBrand() {
        Gate::define('brand-list', 'App\Policies\BrandPolicy@view');
        Gate::define('brand-create', 'App\Policies\BrandPolicy@create');
        Gate::define('brand-edit', 'App\Policies\BrandPolicy@update');
        Gate::define('brand-delete', 'App\Policies\BrandPolicy@delete');
    }

    public function defineGateProduct() {
        Gate::define('product-list', 'App\Policies\ProductPolicy@view');
        Gate::define('product-create', 'App\Policies\ProductPolicy@create');
        Gate::define('product-edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product-delete', 'App\Policies\ProductPolicy@delete');
    }

}


?>