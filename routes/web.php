<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return redirect('/admin/login');// view('welcome');
// });

// Route::get('/register', function () {
//     return view('website.register');
// });

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/getRegisterPageData', [RegisterController::class, 'getRegisterPageData'])->name('getRegisterPageData');
Route::post('/getSpecificStates', [RegisterController::class, 'getSpecificStates'])->name('getSpecificStates');
Route::post('/getSpecificCities', [RegisterController::class, 'getSpecificCities'])->name('getSpecificCities');
Route::post('/addUserData', [RegisterController::class, 'saveUserData'])->name('addUserData');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'login'])->name('login');
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/loginSubmit', [AdminController::class, 'loginSubmit'])->name('loginSubmit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');



    Route::group(['middleware' => ['AdminAuth']], function () {
        /************** PAGE ROUTES ******************/
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'profileIndex'])->name('admin.profile');
        Route::post('/profile/update', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/admin/listing', [AdminController::class, 'adminListing'])->name('admin.listing');
        Route::get('/user/listing', [AdminController::class, 'userListing'])->name('user.listing');
        Route::get('/site/settings', [AdminController::class, 'siteSettings'])->name('admin.site.settings');
        Route::get('/category', [AdminController::class, 'categoryGet'])->name('admin.category.get');
        Route::get('/products', [ProductController::class, 'productIndex'])->name('admin.product.get');
        //user listing


        /************** AJAX ROUTES ******************/
        Route::get('/admin/listing/ajax', [AdminController::class, 'adminListingAjax'])->name('admin.listing.ajax');
        Route::get('/user/listing/ajax', [AdminController::class, 'userListingAjax'])->name('user.listing.ajax');
        Route::post('/admin/edit/ajax', [AdminController::class, 'updateAdminAjax'])->name('admin.edit.ajax');
        Route::post('/user/edit/ajax', [AdminController::class, 'updateUserAjax'])->name('user.edit.ajax');
        Route::post('admin/delete/ajax', [AdminController::class, 'deleteAdminAjax'])->name('admin.delete.ajax');
        Route::post('/user/status/ajax', [AdminController::class, 'updateAdminStatusAjax'])->name('admin.update.status.ajax');
        Route::post('/site/settings/store', [AdminController::class, 'storeSiteSettingsAjax'])->name('admin.store.site.settings.ajax');
        Route::get('/site/settings/get', [AdminController::class, 'getSiteSettingsAjax'])->name('admin.get.site.settings.ajax');
        Route::Post('/settings/file/remove', [AdminController::class, 'settingsFileRemove'])->name('admin.settings.file.remove.ajax');
        Route::get('/category/listing/ajax', [AdminController::class, 'categoryListingAjax'])->name('category.listing.ajax');
        Route::post('/category/edit/ajax', [AdminController::class, 'updateCategoryAjax'])->name('user.category.ajax');
        Route::post('/category/status/ajax', [AdminController::class, 'updateCategoryStatusAjax'])->name('admin.category.status.ajax');

        // Route::post('/getProfilePageData', [AdminController::class, 'getProfilePageData'])->name('admin.getProfilePageData');
    });
});

Route::group(['prefix' => '/'], function () {

    Route::get('/', [RegisterController::class, 'login'])->name('login');
    Route::get('/login', [RegisterController::class, 'login'])->name('user.login');
    Route::post('/loginSubmit', [RegisterController::class, 'loginSubmit'])->name('user.loginSubmit');
    Route::get('/logout', [RegisterController::class, 'logout'])->name('user.logout');

    Route::get('/home', [RegisterController::class, 'home'])->name('user.home');


    Route::group(['middleware' => ['UserAuth']], function () {
        /************** PAGE ROUTES ******************/
        Route::get('/account', function () {
            return view('website.account');
        });
        // Route::get('/home', [RegisterController::class, 'home'])->name('user.home');    
        
        

        /************** AJAX ROUTES ******************/
        // Route::get('/admin/listing/ajax', [AdminController::class, 'adminListingAjax'])->name('admin.listing.ajax');
        
    });
});




Route::get('/', function () {
    return view('website.home');
});
Route::get('/product_detail', function () {
    return view('website.product_detail');
});
// Route::get('/sign_in', function () {
//     return view('website.sign_in');
// });

Route::get('/cart', function () {
    return view('website.cart');
});

Route::get('/products', function () {
    return view('website.products');
});
Route::get('/contact_us', function () {
    return view('website.contact_us');
});
Route::get('/about_us', function () {
    return view('website.about_us');
});
// Route::get('/account', function () {
//     return view('website.account');
// });
Route::get('/checkout', function () {
    return view('website.checkout');
});
Route::get('/blogs', function () {
    return view('website.blogs');
});
Route::get('/blog-detail', function () {
    return view('website.blog_detail');
});
Route::get('/shipping-returns', function () {
    return view('website.shipping_return');
});
Route::get('/delivery-information', function () {
    return view('website.delivery_information');
});
Route::get('/terms-conditions', function () {
    return view('website.terms_conditions');
});
Route::get('/privacy-policy', function () {
    return view('website.privacy_policy');
});
Route::get('/faqs', function () {
    return view('website.faqs');
});
