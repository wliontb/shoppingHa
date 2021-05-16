<?php

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


Route::get('/login','AdminController@loginAdmin')->name('login');

Route::post('/login','AdminController@postLoginAdmin');

Route::get('/register','AdminController@register')->name('register');

Route::post('/register','AdminController@postregister');

Route::get('/admin/index','AdminController@index')->name('admin.index');

Route::get('/logout','AdminController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/category/{slug}/{id}',[
    'as' => 'home.category',
    'uses' => 'HomeController@category'
]);

Route::get('/search',[
    'as' => 'search',
    'uses' => 'HomeController@search'
]);

Route::get('/account',[
    'as' => 'account',
    'uses' => 'HomeController@account'
]);

Route::post('/updateaccount',[
    'as' => 'updateaccount',
    'uses' => 'HomeController@updateaccount'
]);

Route::post('/changepassword',[
    'as' => 'changepassword',
    'uses' => 'HomeController@changepassword'
]);

Route::get('/product/{id}',[
    'as' => 'product',
    'uses' => 'HomeController@product'
]);

Route::get('/destroycart',[
    'as' => 'destroycart',
    'uses' => 'ShoppingController@destroycart'
]);

Route::get('/removecart/{id}',[
    'as' => 'removecart',
    'uses' => 'ShoppingController@removecart'
]);

Route::post('/addorder',[
    'as' => 'addorder',
    'uses' => 'ShoppingController@addorder'
]);

Route::get('/addtocart/{id}',[
    'as' => 'addtocart',
    'uses' => 'ShoppingController@addtocart'
]);

Route::post('/addtocart_qty/{id}',[
    'as' => 'addtocart_qty',
    'uses' => 'ShoppingController@addtocart_qty'
]);

Route::get('/checkout',[
    'as' => 'checkout',
    'uses' => 'ShoppingController@checkout'
]);

Route::get('/cart',[
    'as' => 'cart',
    'uses' => 'ShoppingController@cart'
]);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('admin')->group(function () {
    Route::prefix('orders')->group(function () {
        Route::get('/',[
            'as' => 'orders.index',
            'uses' => 'OrderController@index'
        ]);

        Route::get('/create',[
            'as' => 'orders.create',
            'uses' => 'OrderController@create'
        ]);

        Route::post('/store',[
            'as' => 'orders.store',
            'uses' => 'OrderController@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'orders.edit',
            'uses' => 'OrderController@edit'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'orders.delete',
            'uses' => 'OrderController@delete'
        ]);

        Route::get('/active/{id}',[
            'as' => 'orders.active',
            'uses' => 'OrderController@active'
        ]);

        Route::post('/update/{id}',[
            'as' => 'orders.update',
            'uses' => 'OrderController@update'
        ]);

        Route::get('/detail/{id}',[
            'as' => 'orders.detail',
            'uses' => 'OrderController@detail'
        ]);
    });

    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);

        Route::get('/create',[
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
        ]);

        Route::post('/store',[
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
        ]);

        Route::post('/update/{id}',[
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
    });

    Route::prefix('menus')->group(function () {
        Route::get('/',[
            'as' => 'menus.index',
            'uses' => 'MenuController@index'
        ]);

        Route::get('/create',[
            'as' => 'menus.create',
            'uses' => 'MenuController@create'
        ]);

        Route::post('/store',[
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit'
        ]);

        Route::post('/update/{id}',[
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete'
        ]);
    });

    Route::prefix('products')->group(function () {
        Route::get('/',[
            'as' => 'products.index',
            'uses' => 'AdminProductController@index'
        ]);

        Route::get('/create',[
            'as' => 'products.create',
            'uses' => 'AdminProductController@create'
        ]);

        Route::post('/store',[
            'as' => 'products.store',
            'uses' => 'AdminProductController@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'products.edit',
            'uses' => 'AdminProductController@edit'
        ]);

        Route::post('/update/{id}',[
            'as' => 'products.update',
            'uses' => 'AdminProductController@update'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'products.delete',
            'uses' => 'AdminProductController@delete'
        ]);

    });

    Route::prefix('sliders')->group(function () {
        Route::get('/',[
            'as' => 'sliders.index',
            'uses' => 'SliderAdminController@index'
        ]);

        Route::get('/create',[
            'as' => 'sliders.create',
            'uses' => 'SliderAdminController@create'
        ]);

        Route::post('/store',[
            'as' => 'sliders.store',
            'uses' => 'SliderAdminController@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'sliders.edit',
            'uses' => 'SliderAdminController@edit'
        ]);

        Route::post('/update/{id}',[
            'as' => 'sliders.update',
            'uses' => 'SliderAdminController@update'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'sliders.delete',
            'uses' => 'SliderAdminController@delete'
        ]);

    });

    Route::prefix('settings')->group(function () {
        Route::get('/',[
            'as' => 'settings.index',
            'uses' => 'AdminSettingController@index'
        ]);

        Route::get('/create',[
            'as' => 'settings.create',
            'uses' => 'AdminSettingController@create'
        ]);

        Route::post('/store',[
            'as' => 'settings.store',
            'uses' => 'AdminSettingController@store'
        ]);

    });

    Route::prefix('users')->group(function () {
        Route::get('/',[
            'as' => 'users.index',
            'uses' => 'AdminUserController@index'
        ]);

        Route::get('/create',[
            'as' => 'users.create',
            'uses' => 'AdminUserController@create'
        ]);

        Route::post('/store',[
            'as' => 'users.store',
            'uses' => 'AdminUserController@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'users.edit',
            'uses' => 'AdminUserController@edit'
        ]);

        Route::post('/update/{id}',[
            'as' => 'users.update',
            'uses' => 'AdminUserController@update'
        ]);

        Route::get('/delete/{id}',[
            'as' => 'users.delete',
            'uses' => 'AdminUserController@delete'
        ]);

    });

    Route::prefix('roles')->group(function () {
        Route::get('/',[
            'as' => 'roles.index',
            'uses' => 'AdminRoleController@index'
        ]);

        Route::get('/create',[
            'as' => 'roles.create',
            'uses' => 'AdminRoleController@create'
        ]);

        Route::post('/store',[
            'as' => 'roles.store',
            'uses' => 'AdminRoleController@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'roles.edit',
            'uses' => 'AdminRoleController@edit'
        ]);

        Route::post('/update/{id}',[
            'as' => 'roles.update',
            'uses' => 'AdminRoleController@update'
        ]);
    });
});

