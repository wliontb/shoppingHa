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

Route::get('/admin','AdminController@loginAdmin');

Route::post('/admin','AdminController@postLoginAdmin');

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('admin')->group(function () {
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

