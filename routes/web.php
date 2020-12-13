<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/trang-chu', 'homeclientController@index')->name('home');

route::get('/tin-tuc/{id}' . '-' . '{slug}', [
    'as' => 'tintuc.index',
    'uses' => 'clientNewController@index'
]);

Route::get('/', 'homeclientController@index');

Route::group(['prefix' => 'laravel-filemanager',], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
route::get('/san-pham/{id}/{slug}', 'ClientProductDetailController@detail')->name('productdetail');
Auth::routes();
route::get('/dang-nhap', 'loginClient@index')->name('loginUser');
route::post('/dang-nhap', 'loginClient@login')->name('logonUser');
Route::group(['middleware' => ['auth:userclient']], function () {
    route::post('/dang-xuat', 'loginClient@logoutclient')->name('dangxuat');
    route::get('/thanh-toan', 'checkoutController@index')->name('thanhtoan');
    route::post('/thanh-toan', 'checkoutController@placeOrder')->name('checkout');
    route::get('/chi-tiet-don-hang', 'checkoutController@chitietdon')->name('chitietdonhang');
    route::get('/chi-tiet-don-hang/{id}', 'checkoutController@delete')->name('removeorder');
    Route::prefix('gio-hang')->group(function () {

        Route::get('/', [
            'as' => 'cart.index',
            'uses' => 'cartController@index'
        ]);

        Route::get('/create/{id}', [
            'as' => 'cart.create',
            'uses' => 'cartController@create'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'cart.edit',
            'uses' => 'cartController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'cart.update',
            'uses' => 'cartController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'cart.delete',
            'uses' => 'cartController@delete'
        ]);
    });
});

Route::prefix('admin',)->group(function () {

    route::get('/', function () {
        return redirect()->to('admin/dashboard');
    });

    route::get('/', [
        'as' => 'admin.login',
        'uses' => 'loginController@login'
    ]);

    route::post('/loginadmin', [
        'as' => 'admin.loginadmin',
        'uses' => 'loginController@loginadmin'
    ]);

    Route::group(['middleware' => ['auth:web']], function () {
        route::post('/logoutadmin', [
            'as' => 'admin.logoutadmin',
            'uses' => 'loginController@logoutadmin'
        ]);

        Route::prefix('menulist')->group(function () {

            Route::get('/', [
                'as' => 'menulist.index',
                'uses' => 'menuController@index'
            ]);
            Route::get('/add', [
                'as' => 'menulist.add',
                'uses' => 'menuController@loadSelect'
            ]);
            Route::post('/create', [
                'as' => 'menulist.create',
                'uses' => 'menuController@create'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'menulist.edit',
                'uses' => 'menuController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'menulist.update',
                'uses' => 'menuController@update'
            ]);
            Route::get('/updates', [
                'as' => 'menulist.updates',
                'uses' => 'menuController@updates'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'menulist.delete',
                'uses' => 'menuController@delete'
            ]);
        });
        Route::prefix('dashboard')->group(function () {

            Route::get('/', [
                'as' => 'dashboard.index',
                'uses' => 'admindashboardController@index'
            ]);
        });

        Route::prefix('product')->group(function () {

            Route::get('/', [
                'as' => 'product.index',
                'uses' => 'productController@index'
            ]);
            Route::get('/add', [
                'as' => 'product.add',
                'uses' => 'productController@add'
            ]);
            Route::post('/store', [
                'as' => 'product.store',
                'uses' => 'productController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'product.edit',
                'uses' => 'productController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'product.update',
                'uses' => 'productController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'product.delete',
                'uses' => 'productController@delete'
            ]);
        });

        Route::prefix('category')->group(function () {

            Route::get('/', [
                'as' => 'category.index',
                'uses' => 'categoryController@index'
            ]);
            Route::get('/add', [
                'as' => 'category.add',
                'uses' => 'categoryController@loadSelect'
            ]);
            Route::post('/create', [
                'as' => 'category.create',
                'uses' => 'categoryController@create'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'category.edit',
                'uses' => 'categoryController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'category.update',
                'uses' => 'categoryController@update'
            ]);
            Route::get('/updates', [
                'as' => 'category.updates',
                'uses' => 'categoryController@updates'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'category.delete',
                'uses' => 'categoryController@delete'
            ]);
        });
        Route::prefix('coupon')->group(function () {

            Route::get('/', [
                'as' => 'coupon.index',
                'uses' => 'adminCouponController@index'
            ]);
            Route::get('/add', [
                'as' => 'coupon.add',
                'uses' => 'adminCouponController@add'
            ]);
            Route::post('/create', [
                'as' => 'coupon.create',
                'uses' => 'adminCouponController@create'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'coupon.edit',
                'uses' => 'adminCouponController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'coupon.update',
                'uses' => 'adminCouponController@update'
            ]);
            Route::get('/updates', [
                'as' => 'coupon.updates',
                'uses' => 'adminCouponController@updates'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'coupon.delete',
                'uses' => 'adminCouponController@delete'
            ]);
        });
        Route::prefix('slide')->group(function () {

            Route::get('/', [
                'as' => 'slide.index',
                'uses' => 'slideController@index'
            ]);
            Route::get('/add', [
                'as' => 'slide.add',
                'uses' => 'slideController@create'
            ]);
            Route::post('/insert', [
                'as' => 'slide.insert',
                'uses' => 'slideController@insert'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'slide.edit',
                'uses' => 'slideController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'slide.update',
                'uses' => 'slideController@update'
            ]);
            Route::get('/updates', [
                'as' => 'slide.updates',
                'uses' => 'slideController@updates'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'slide.delete',
                'uses' => 'slideController@delete'
            ]);
        });
        Route::prefix('setting')->group(function () {

            Route::get('/', [
                'as' => 'setting.index',
                'uses' => 'adminsettingController@index'
            ]);
            Route::get('/add', [
                'as' => 'setting.add',
                'uses' => 'adminsettingController@add'
            ]);
            Route::post('/insert', [
                'as' => 'setting.insert',
                'uses' => 'adminsettingController@insert'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'setting.edit',
                'uses' => 'adminsettingController@edit'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'setting.delete',
                'uses' => 'adminsettingController@delete'
            ]);
            Route::post('/update/{id}', [
                'as' => 'setting.update',
                'uses' => 'adminsettingController@update'
            ]);
        });
        Route::prefix('user')->group(function () {

            Route::get('/', [
                'as' => 'user.index',
                'uses' => 'adminUserController@index'
            ]);
            Route::get('/add', [
                'as' => 'user.add',
                'uses' => 'adminUserController@add'
            ]);
            Route::post('/insert', [
                'as' => 'user.insert',
                'uses' => 'adminUserController@insert'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'user.edit',
                'uses' => 'adminUserController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'user.update',
                'uses' => 'adminUserController@update'
            ]);
            Route::get('/updates', [
                'as' => 'user.updates',
                'uses' => 'adminUserController@updates'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'user.delete',
                'uses' => 'adminUserController@delete'
            ]);
        });
        Route::prefix('roles')->group(function () {

            Route::get('/', [
                'as' => 'roles.index',
                'uses' => 'adminRolesController@index'
            ]);
            Route::get('/add', [
                'as' => 'roles.add',
                'uses' => 'adminRolesController@add'
            ]);
            Route::post('/insert', [
                'as' => 'roles.insert',
                'uses' => 'adminRolesController@insert'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'roles.edit',
                'uses' => 'adminRolesController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'roles.update',
                'uses' => 'adminRolesController@update'
            ]);

            Route::get('/delete/{id}', [
                'as' => 'roles.delete',
                'uses' => 'adminRolesController@delete'
            ]);
        });
        Route::prefix('permission')->group(function () {


            Route::get('/add', [
                'as' => 'permission.add',
                'uses' => 'adminPermissionController@add'
            ]);
            Route::post('/insert', [
                'as' => 'permission.insert',
                'uses' => 'adminPermissionController@insert'
            ]);
        });
        Route::prefix('news')->group(function () {

            Route::get('/', [
                'as' => 'news.index',
                'uses' => 'adminNewController@index'
            ]);
            Route::get('/add', [
                'as' => 'news.add',
                'uses' => 'adminNewController@loadSelect'
            ]);
            Route::post('/create', [
                'as' => 'news.create',
                'uses' => 'adminNewController@create'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'news.edit',
                'uses' => 'adminNewController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'news.update',
                'uses' => 'adminNewController@update'
            ]);
            Route::get('/updates', [
                'as' => 'news.updates',
                'uses' => 'adminNewController@updates'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'news.delete',
                'uses' => 'adminNewController@delete'
            ]);
        });
        Route::prefix('newscontent')->group(function () {

            Route::get('/', [
                'as' => 'newscontent.index',
                'uses' => 'adminNewContentController@index'
            ]);
            Route::get('/add', [
                'as' => 'newscontent.add',
                'uses' => 'adminNewContentController@add'
            ]);
            Route::post('/store', [
                'as' => 'newscontent.store',
                'uses' => 'adminNewContentController@store'
            ]);
            Route::get('/edit/{id}', [
                'as' => 'newscontent.edit',
                'uses' => 'adminNewContentController@edit'
            ]);
            Route::post('/update/{id}', [
                'as' => 'newscontent.update',
                'uses' => 'adminNewContentController@update'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'newscontent.delete',
                'uses' => 'adminNewContentController@delete'
            ]);
        });
        Route::prefix('orderlist')->group(function () {

            Route::get('/', [
                'as' => 'order.index',
                'uses' => 'adminorder@index'
            ]);

            Route::get('/detail/{id}', [
                'as' => 'order.detail',
                'uses' => 'adminorder@detail'
            ]);
            Route::get('/updates', [
                'as' => 'order.updates',
                'uses' => 'adminorder@updates'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'order.delete',
                'uses' => 'adminorder@delete'
            ]);
        });
        route::get('/printer/{id}', 'adminorder@printer')->name('prin');
    });
});

route::get('/bang-tin/{slug}/{id}', [
    'as' => 'newdetail.detail',
    'uses' => 'clientNewController@detail'
]);


route::get('/{slug}/{id}', 'clientcateproduct@index')->name('cateproduct');

route::get('/{slug}/{id}/{ids}', 'clientcateproduct@index')->name('cateproducts');
route::get('/san-pham/{id}/{slug}', 'ClientProductDetailController@detail')->name('productdetail');
