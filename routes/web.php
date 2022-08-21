<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;


// Homepage access
Route::get('/', 'App\Http\Controllers\HomeController@index');


// For admin access
Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');

Route::get('/admin/home', function(){
    return view('admin.home');
});

Auth::routes();

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin/home');




Route::prefix('admin')->group(function(){

//Category
Route::prefix('categories')->group(function () {
    Route::get('/', [
        'as' => 'categories.index',
        'uses' => 'App\Http\Controllers\CategoryController@index',
        'middleware' => 'can:category-list'
    ]);
        
    Route::get('/create', [
        'as' => 'categories.create',
        'uses' => 'App\Http\Controllers\CategoryController@create',
        'middleware' => 'can:category-create'
    ]);
    
    Route::post('/store', [
        'as' => 'categories.store',
        'uses' => 'App\Http\Controllers\CategoryController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'categories.edit',
        'uses' => 'App\Http\Controllers\CategoryController@edit',
        'middleware' => 'can:category-edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'categories.update',
        'uses' => 'App\Http\Controllers\CategoryController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'categories.delete',
        'uses' => 'App\Http\Controllers\CategoryController@delete',
        'middleware' => 'can:category-delete'
    ]);

});

//Brand    
Route::prefix('brands')->group(function () {
    Route::get('/', [
        'as' => 'brands.index',
        'uses' => 'App\Http\Controllers\BrandController@index',
        'middleware' => 'can:brand-list'
    ]);
    
    Route::get('/create', [
        'as' => 'brands.create',
        'uses' => 'App\Http\Controllers\BrandController@create',
        'middleware' => 'can:brand-create'
    ]);
    
    Route::post('/store', [
        'as' => 'brands.store',
        'uses' => 'App\Http\Controllers\BrandController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'brands.edit',
        'uses' => 'App\Http\Controllers\BrandController@edit',
        'middleware' => 'can:brand-edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'brands.update',
        'uses' => 'App\Http\Controllers\BrandController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'brands.delete',
        'uses' => 'App\Http\Controllers\BrandController@delete',
        'middleware' => 'can:brand-delete'
    ]);

});

//Menu
Route::prefix('menus')->group(function () {
    Route::get('/', [
        'as' => 'menus.index',
        'uses' => 'App\Http\Controllers\MenuController@index',
        'middleware' => 'can:menu-list'
    ]);
    
    Route::get('/create', [
        'as' => 'menus.create',
        'uses' => 'App\Http\Controllers\MenuController@create'
    ]);
    
    Route::post('/store', [
        'as' => 'menus.store',
        'uses' => 'App\Http\Controllers\MenuController@store'
    ]);
    
    Route::get('/edit/{id}', [
        'as' => 'menus.edit',
        'uses' => 'App\Http\Controllers\MenuController@edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'menus.update',
        'uses' => 'App\Http\Controllers\MenuController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'menus.delete',
        'uses' => 'App\Http\Controllers\MenuController@delete'
    ]);

});

//Product
Route::prefix('products')->group(function () {
    Route::get('/', [
        'as' => 'products.index',
        'uses' => 'App\Http\Controllers\AdminProductController@index',
        'middleware' => 'can:product-list'
    ]);
    
    Route::get('/create', [
        'as' => 'products.create',
        'uses' => 'App\Http\Controllers\AdminProductController@create',
        'middleware' => 'can:product-create'
    ]);

    Route::post('/store', [
        'as' => 'products.store',
        'uses' => 'App\Http\Controllers\AdminProductController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'products.edit',
        'uses' => 'App\Http\Controllers\AdminProductController@edit',
        'middleware' => 'can:product-edit,id'
    ]);

    Route::post('/update/{id}', [
        'as' => 'products.update',
        'uses' => 'App\Http\Controllers\AdminProductController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'products.delete',
        'uses' => 'App\Http\Controllers\AdminProductController@delete',
        'middleware' => 'can:product-delete,id'
    ]);
    
});

//Slider
Route::prefix('sliders')->group(function () {
    Route::get('/', [
        'as' => 'sliders.index',
        'uses' => 'App\Http\Controllers\SliderAdminController@index'
    ]);

    Route::get('create', [
        'as' => 'sliders.create',
        'uses' => 'App\Http\Controllers\SliderAdminController@create'
    ]);

    Route::post('store', [
        'as' => 'sliders.store',
        'uses' => 'App\Http\Controllers\SliderAdminController@store'
    ]);

    Route::get('edit/{id}', [
        'as' => 'sliders.edit',
        'uses' => 'App\Http\Controllers\SliderAdminController@edit'
    ]);

    Route::post('update/{id}', [
        'as' => 'sliders.update',
        'uses' => 'App\Http\Controllers\SliderAdminController@update'
    ]);

    Route::get('delete/{id}', [
        'as' => 'sliders.delete',
        'uses' => 'App\Http\Controllers\SliderAdminController@delete'
    ]);


});

//Settings
Route::prefix('settings')->group(function () {
    Route::get('/', [
        'as' => 'settings.index',
        'uses' => 'App\Http\Controllers\AdminSettingsController@index'
    ]);
    
    Route::get('/create', [
        'as' => 'settings.create',
        'uses' => 'App\Http\Controllers\AdminSettingsController@create'
    ]);

    Route::post('/store',[
        'as' => 'settings.store',
        'uses' => 'App\Http\Controllers\AdminSettingsController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'settings.edit',
        'uses' => 'App\Http\Controllers\AdminSettingsController@edit'
    ]);

    Route::post('/update/{id}',[
        'as' =>'settings.update',
        'uses' => 'App\Http\Controllers\AdminSettingsController@update'
    ]); 

    Route::get('/delete/{id}', [
        'as' => 'settings.delete',
        'uses' => 'App\Http\Controllers\AdminSettingsController@delete'
    ]);
});

//User
Route::prefix('users')->group(function () {
    Route::get('/', [
        'as' => 'users.index',
        'uses' => 'App\Http\Controllers\AdminUserController@index'
    ]);

    Route::get('/create', [
        'as' => 'users.create',
        'uses' => 'App\Http\Controllers\AdminUserController@create'
    ]);

    Route::post('/store', [
        'as' => 'users.store',
        'uses' => 'App\Http\Controllers\AdminUserController@store'
    ]);
    
    Route::get('/edit/{id}', [
        'as' => 'users.edit',
        'uses' => 'App\Http\Controllers\AdminUserController@edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'users.update',
        'uses' => 'App\Http\Controllers\AdminUserController@update'
    ]);

    Route::get('/delete/{id}', [
        'as' => 'users.delete',
        'uses' => 'App\Http\Controllers\AdminUserController@delete'
    ]);
    

    

    

    

    
});

//Roles
Route::prefix('roles')->group(function () {
    Route::get('/', [
        'as' => 'roles.index',
        'uses' => 'App\Http\Controllers\AdminRoleController@index'
    ]);

    Route::get('/create', [
        'as' => 'roles.create',
        'uses' => 'App\Http\Controllers\AdminRoleController@create'
    ]);

    Route::post('/store', [
        'as' => 'roles.store',
        'uses' => 'App\Http\Controllers\AdminRoleController@store'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'roles.edit',
        'uses' => 'App\Http\Controllers\AdminRoleController@edit'
    ]);

    Route::post('/update/{id}', [
        'as' => 'roles.update',
        'uses' => 'App\Http\Controllers\AdminRoleController@update'
    ]);    

    Route::get('/delete/{id}', [
        'as' => 'roles.delete',
        'uses' => 'App\Http\Controllers\AdminRoleController@delete'
    ]);
});

//Permission
Route::prefix('permissions')->group(function () {

    Route::get('/create', [
        'as' => 'permissions.create',
        'uses' => 'App\Http\Controllers\AdminPermissionController@createPermissions'
    ]);

    Route::post('/store', [
        'as' => 'permissions.store',
        'uses' => 'App\Http\Controllers\AdminPermissionController@store'
    ]);

  
    

    

    
});





});

