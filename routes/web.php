<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PaymentController;
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
Route::post('/addAddress', [RegisterController::class, 'addAddress'])->name('addAddress');
Route::post('/countryData', [RegisterController::class, 'countryData'])->name('countryData');
Route::post('/deleteAddress', [RegisterController::class, 'deleteAddress'])->name('deleteAddress');


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
        //contact us
        Route::get('/contactus', [ContactUsController::class, 'contactIndex'])->name('admin.contactus.index');

        //news letters
        Route::get('/newsletter', [NewsLetterController::class, 'newsletterIndex'])->name('admin.newsletter.index');
        //testimonials
        Route::get('/testimonials', [TestimonialController::class, 'testimonialIndex'])->name('admin.testimonials');


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

        // Admin Product Start //
        Route::get('/products', [ProductController::class, 'showProducts'])->name('admin.products.index');
        Route::post('/products/get', [ProductController::class, 'getProducts'])->name('admin.products.get');
        Route::post('/products/store', [ProductController::class, 'storeProduct'])->name('admin.products.store');
        Route::post('/products/delete', [ProductController::class, 'deleteProduct'])->name('admin.products.destroy');
        Route::post('/product/markAsDiscounted/ajax', [ProductController::class, 'markAsDiscounted'])->name('product.markAsDiscounted.ajax');
        Route::post('/product/markAsFeatured/ajax', [ProductController::class, 'markAsFeatured'])->name('product.markAsFeatured.ajax');
        Route::post('/products/getSpecificProductDetail', [ProductController::class, 'getSpecificProductDetail'])->name('admin.products.getSpecificProductDetail');
        Route::post('/products/markAsFeatured', [ProductController::class, 'markAsFeatured'])->name('admin.products.markAsFeatured');
        Route::post('/products/markProductStatus', [ProductController::class, 'markProductStatus'])->name('admin.products.markProductStatus');
        Route::post('/products/changeProductOfferedStatus', [ProductController::class, 'changeProductOfferedStatus'])->name('admin.products.changeProductOfferedStatus');
        Route::post('/products/changeProductFeaturedStatus', [ProductController::class, 'changeProductFeaturedStatus'])->name('admin.products.changeProductFeaturedStatus');

        // Product Images
        Route::get('/products/images', [ProductController::class, 'getProductImages'])->name('admin.products.images.index');
        Route::post('/product/store/images', [ProductController::class, 'storeProductImages'])->name('admin.product.store.images');
        Route::post('/product/delete/images', [ProductController::class, 'deleteProductImages'])->name('admin.products.images.destroy');

        // Product Brands
        Route::get('/brands', [ProductController::class, 'getBrands'])->name('admin.brands.index');
        Route::post('/brands/{id}', [ProductController::class, 'getBrand'])->name('admin.brands.show');

        // Product Categories
        Route::get('/categories', [ProductController::class, 'getCategories'])->name('admin.categories.index');
        Route::post('/categories/{id}', [ProductController::class, 'getCategory'])->name('admin.categories.show');

        // Product Specifications
        Route::post('/products/specifications', [ProductController::class, 'getProductSpecifications'])->name('admin.products.specifications.index');
        Route::post('/products/saveProductSpecifications', [ProductController::class, 'storeProductSpecifications'])->name('admin.products.saveProductSpecifications');
        Route::post('/products/deleteSpecification', [ProductController::class, 'deleteSpecification'])->name('admin.products.deleteSpecification');

        // Product Features
        Route::post('/products/saveProductFeature', [ProductController::class, 'storeProductFeature'])->name('admin.products.saveProductFeature');
        Route::post('/products/deleteProductFeature', [ProductController::class, 'deleteProductFeature'])->name('admin.products.deleteProductFeature');

        // Admin Product End //

        //contact us
        Route::post('/contact/storeOrUpdate', [ContactUsController::class, 'storeOrUpdate'])->name('admin.contact.storeUpdate');
        //all contact
        Route::get('/contact/ajax', [ContactUsController::class, 'contactUsAjax'])->name('admin.contact.ajax');
        //contact by id
        Route::post('/getcontact/ajax', [ContactUsController::class, 'getContactUsAjax'])->name('admin.getcontact.ajax');
        Route::post('/contact/status/ajax', [ContactUsController::class, 'updateContactAjax'])->name('contact.update.status.ajax');
        //newsletter
        Route::get('/newletters/ajax', [NewsLetterController::class, 'newsLetterListing'])->name('admin.newsletter.list');
        Route::post('/newsDelete/ajax', [NewsLetterController::class, 'newsletterDelete'])->name('admin.newsletter.delete');


        //testimonials
        Route::post('/testimonials/createOrUpdate', [TestimonialController::class, 'createOrUpdate'])->name('admin.testimonials.createOrUpdate');
        Route::get('/testimonials/ajax', [TestimonialController::class, 'testimonialListing'])->name('admin.testimonials.list');
        Route::post('/testimonial/delete', [TestimonialController::class, 'testimonialDelete'])->name('admin.testimonial.delete');
        Route::post('/testimonial/status', [TestimonialController::class, 'updateStatus'])->name('admin.testimonial.updateStatus');
    });
});












Route::group(['prefix' => '/'], function () {

    Route::get('/', [WebsiteController::class, 'home'])->name('home');
    Route::get('/login', [RegisterController::class, 'login'])->name('user.login');
    Route::post('/loginSubmit', [RegisterController::class, 'loginSubmit'])->name('user.loginSubmit');
    Route::get('/logout', [RegisterController::class, 'logout'])->name('user.logout');
    Route::get('/forget_password', [RegisterController::class, 'forget_password'])->name('user.forgetpassword');

    Route::get('/home', [WebsiteController::class, 'home'])->name('user.home');
    Route::post('/verifyEmailForget', [RegisterController::class, 'verifyEmailForget'])->name('user.verifyEmailForget');
    Route::post('/verifyOtpForget', [RegisterController::class, 'verifyOtpForget'])->name('user.verifyOtpForget');
    Route::post('/changePassForget', [RegisterController::class, 'changePassForget'])->name('user.changePassForget');


    Route::get('/products_listing', [WebsiteController::class, 'productsListing'])->name('user.productsListing');
    Route::get('/testimonials', [WebsiteController::class, 'testimonialsListing'])->name('user.testimonials');
    Route::post('/account/update', [WebsiteController::class, 'accountUpdate'])->name('user.accountUpdate');
    Route::get('/new_products', [WebsiteController::class, 'newProducts'])->name('user.newProducts');
    Route::get('/product_detail/{catName}/{sku}', [WebsiteController::class, 'productDetail'])->name('user.productDetail');
    Route::post('/newsletters/create/ajax', [NewsLetterController::class, 'newLetterCreate'])->name('admin.newsletter.create');
    //cart and listings
    Route::post('/cart/add', [WebsiteController::class, 'cartAdd'])->name('cart.add');
    Route::post('/cart/view', [WebsiteController::class, 'cartView'])->name('cart.view');
    Route::post('/cart/delete', [WebsiteController::class, 'cartDelete'])->name('cart.delete');

    //middleware routes
    Route::group(['middleware' => ['UserAuth']], function () {
        /************** PAGE ROUTES ******************/
        Route::get('/dashboard', [WebsiteController::class, 'account'])->name('user.dashboard');
        Route::post('/continue/checkout/prepayment', [WebsiteController::class, 'continueCheckout'])->name('user.continueCheckout');




        /************** AJAX ROUTES ******************/
        Route::get('/user', [WebsiteController::class, 'authUser'])->name('authUser');
    });
});



// Route::get('/', function () {
//     return view('website.home');
// });
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


Route::get('payment', function () {
    return view('website.payment');
});

Route::post('payment', [PaymentController::class, 'makePayment'])->name('payment.make');
