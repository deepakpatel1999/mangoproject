<?php

use App\Http\Controllers\Subscriptions\WebhookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrySomethingController;
use App\Http\Controllers\EshoperController;
use App\Http\Controllers\UstoraController;


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

Route::post('webhooks/stripe', [WebhookController::class, 'handleWebhook']);

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('index');
});
Route::get('/edit_profile', [FrontendController::class, 'edit_profile'])->name('edit_profile');

Route::get('/event_details', [FrontendController::class, 'event_details'])->name('event_details');

Route::get('/event_listing', [FrontendController::class, 'event_listing'])->name('event_listing');

Route::get('/how_to_score_points', [FrontendController::class, 'how_to_score_points'])->name('how_to_score_points');

Route::get('/kids', [FrontendController::class, 'kids'])->name('kids');

Route::get('/my_favourite', [FrontendController::class, 'my_favourite'])->name('my_favourite');

Route::get('/search_results', [FrontendController::class, 'search_results'])->name('search_results');

Route::get('/user_profile', [FrontendController::class, 'user_profile'])->name('user_profile');

Route::get('/inspirations-data/{id}', [FrontendController::class, 'inspirations_data'])->name('inspirations-data');

Route::get('/inspirations-all-data', [FrontendController::class, 'inspirations_all_data'])->name('inspirations-all-data');

Route::get('/category-data/{id}', [FrontendController::class, 'category_data'])->name('category-data');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('Admin/Home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::post('/admin/Edit-profile', [HomeController::class, 'edit_profile'])->name('admin.edit_profile');
});

Route::get('/category', [HomeController::class, 'category'])->name('category');

Route::post('/add-catagory', [HomeController::class, 'add_catagory'])->name('add-catagory');

Route::post('/categories-delete', [HomeController::class, 'categories_delete'])->name('categories-delete');

Route::post('/category-update', [HomeController::class, 'category_update'])->name('category-update');

Route::get('/inspiration', [HomeController::class, 'inspiration'])->name('inspiration');

Route::get('/create', [HomeController::class, 'create'])->name('create');

Route::post('/create-data', [HomeController::class, 'create_data'])->name('create-data');

Route::get('/edit-data/{id}', [HomeController::class, 'edit_data'])->name('edit-data');

Route::post('/update-data', [HomeController::class, 'update_data'])->name('update-data');

Route::post('/delete-data', [HomeController::class, 'delete_data'])->name('delete-data');

Route::get('auth/google', [HomeController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [HomeController::class, 'handleGoogleCallback']);

Route::get('/most-love-by', [HomeController::class, 'most_love_by'])->name('most-love-by');

Route::post('/add-most-love', [HomeController::class, 'add_most_love'])->name('add-most-love');

Route::post('/most-love-update', [HomeController::class, 'most_love_update'])->name('most-love-update');

Route::post('/most-love-delete', [HomeController::class, 'most_love_delete'])->name('most-love-delete');

Route::get('/editor-picks', [HomeController::class, 'editor_picks'])->name('editor-picks');

Route::get('/create-editor-picks', [HomeController::class, 'create_editor_picks'])->name('create-editor-picks');

Route::post('/create-editor', [HomeController::class, 'create_editor'])->name('create-editor');

Route::post('/editor-picks-update', [HomeController::class, 'editor_picks_update'])->name('editor-picks-update');

Route::post('/editor-picks-delete', [HomeController::class, 'editor_picks_elete'])->name('editor-picks-delete');

Route::get('/try-something', [TrySomethingController::class, 'try_something'])->name('try-something');

Route::get('/create-try-somthing', [TrySomethingController::class, 'create_try_somthing'])->name('create-try-somthing');

Route::post('/create-try', [TrySomethingController::class, 'create_try'])->name('create-try');

Route::post('/try-something-update', [TrySomethingController::class, 'try_something_update'])->name('try-something-update');

Route::post('/try-something-delete', [TrySomethingController::class, 'try_something_delete'])->name('try-something-delete');

Route::get('/more-to-explore', [HomeController::class, 'more_to_explore'])->name('more-to-explore');

Route::get('/create-more-to-explore', [HomeController::class, 'create_more_to_explore'])->name('create-more-to-explore');

Route::post('/create-more-to', [HomeController::class, 'create_more_to'])->name('create-more-to');

Route::post('/more-to-update', [HomeController::class, 'more_to_update'])->name('more-to-update');

Route::post('/more-to-delete', [HomeController::class, 'more_to_delete'])->name('more-to-delete');

Route::get('/browse-by-category', [HomeController::class, 'browse_by_category'])->name('browse-by-category');

Route::get('/create-browse-by-category', [HomeController::class, 'create_browse_by_category'])->name('create-browse-by-category');

Route::post('/insert-browse-by', [HomeController::class, 'insert_browse_by'])->name('insert-browse-by');

Route::post('/browse-to-category-update', [HomeController::class, 'browse_to_category_update'])->name('browse-to-category-update');

Route::post('/browse-by-delete', [HomeController::class, 'browse_by_delete'])->name('browse-by-delete');

Route::get('/setting-display', [HomeController::class, 'setting_display'])->name('setting-display');

Route::post('/setting-data-update', [HomeController::class, 'setting_data_update'])->name('setting-data-update');

Route::get('/banner-display', [HomeController::class, 'banner_display'])->name('banner-display');

Route::get('/banner-create-data', [HomeController::class, 'banner_create_data'])->name('banner-create-data');

Route::post('/insert-baner-data', [HomeController::class, 'insert_baner_data'])->name('insert-baner-data');

Route::post('/banner-data-update', [HomeController::class, 'banner_data_update'])->name('banner-data-update');

Route::post('/banner-data-delete', [HomeController::class, 'banner_data_delete'])->name('banner-data-delete');

/*E-SHOPPER START*/
Route::get('/e-shopper-banner', [EshoperController::class, 'e_shopper_banner'])->name('e-shopper-banner');

Route::get('/add-shop-baner', [EshoperController::class, 'add_shop_baner'])->name('add-shop-baner');

Route::post('/insert-shop-banner', [EshoperController::class, 'insert_shop_banner'])->name('insert-shop-banner');

Route::post('/e-shop-banner-update', [EshoperController::class, 'e_shop_banner_update'])->name('e-shop-banner-update');

Route::post('/e-shopper-banner-delete', [EshoperController::class, 'e_shopper_banner_delete'])->name('e-shopper-banner-delete');

Route::get('/product-list', [EshoperController::class, 'product_list'])->name('product-list');

Route::get('/add-product', [EshoperController::class, 'add_product'])->name('add-product');

Route::post('/product-store', [EshoperController::class, 'product_store'])->name('product-store');

Route::get('/product-delete/{id}', [EshoperController::class, 'product_delete'])->name('product-delete');

Route::get('/product-edit/{id}', [EshoperController::class, 'product_edit'])->name('product-edit');

Route::post('/product-update', [EshoperController::class, 'product_update'])->name('product-update');

Route::get('/category-list', [EshoperController::class, 'category_list'])->name('category-list');

Route::get('/add-category', [EshoperController::class, 'add_category'])->name('add-category');

Route::post('/categrory-store', [EshoperController::class, 'categrory_store'])->name('categrory-store');

Route::post('/category-update', [EshoperController::class, 'category_update'])->name('category-update');

Route::post('/category-delete', [EshoperController::class, 'category_delete'])->name('category-delete');

//USTORA 
Route::get('/ustora-product-list', [UstoraController::class, 'ustora_product_list'])->name('ustora-product-list');
Route::get('/add-ustora-product', [UstoraController::class, 'add_ustora_product'])->name('add-ustora-product');
Route::post('/ustoraproduct-store', [UstoraController::class, 'ustora_product_store'])->name('utoraproduct-store');
Route::get('/ustoraproduct-delete/{id}', [UstoraController::class, 'ustoraproduct_delete'])->name('ustoraproduct-delete');


Route::group(['namespace' => 'Subscriptions'], function () {
    Route::get('plans', [App\Http\Controllers\Subscriptions\SubscriptionController::class, 'index'])->name('plans');

    Route::get('/payments', [App\Http\Controllers\Subscriptions\PaymentController::class, 'index'])->name('payments');

    Route::post('/payments', [App\Http\Controllers\Subscriptions\PaymentController::class, 'store'])->name('payments.store');

    Route::get('/subscriptions-list', [App\Http\Controllers\Subscriptions\SubscriptionController::class, 'subscriptions_list'])->name('subscriptions-list');

    Route::get('/canceled', [App\Http\Controllers\Subscriptions\SubscriptionController::class, 'canceled'])->name('canceled');

    Route::get('/upgrate/{id}', [App\Http\Controllers\Subscriptions\SubscriptionController::class, 'upgrate'])->name('upgrate');

    Route::get('/upgrade-subcription/{id}', [App\Http\Controllers\Subscriptions\PaymentController::class, 'upgrade_subcription'])->name('upgrade-subcription');
});
Route::group(['prefix' => 'subcription'], function () {
    Route::get('/user-subcription-list', [App\Http\Controllers\HomeController::class, 'user_Subcription_list'])->name('user-subcription-list');

    Route::post('/filterdata', [App\Http\Controllers\HomeController::class, 'filterdata'])->name('filterdata');
});
