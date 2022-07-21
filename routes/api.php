<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [ApiController::class, 'login'])->name('login');

Route::post('/signup', [ApiController::class, 'signup'])->name('signup');

//Get Product//
Route::get('/shop-category', [ApiController::class, 'shop_category'])->name('shop-category');

Route::get('/category-filter-product/{id}', [ApiController::class, 'category_filter_product'])->name('category-category');

Route::get('/features-filter-product', [ApiController::class, 'features_filter_product'])->name('features-filter-category');

Route::get('/all-product', [ApiController::class, 'all_product'])->name('all-product');

Route::get('/recommended-filter-product', [ApiController::class, 'recommended_filter_product'])->name('recommended-filter-category');

Route::get('/product-details/{id}', [ApiController::class, 'product_details'])->name('product-details');

Route::group(['middleware' => ['auth:sanctum']], function () {

  Route::get('/inspirationp-get-data', [ApiController::class, 'inspiration_get_data'])->name('inspiration-get-data');

  Route::post('/inspirationp-insert-data', [ApiController::class, 'inspiration_insert_data'])->name('inspiration-insert-data');

  Route::get('/inspiration-edit/{id}', [ApiController::class, 'Inspiration_edit'])->name('inspiration-edit');

  Route::post('/inspirationp-update-data', [ApiController::class, 'inspiration_update_data'])->name('inspiration-update-data');

  Route::post('/inspirationp-delete-data', [ApiController::class, 'inspiration_delete_data'])->name('inspiration-delete-data');

  Route::get('/category-get-data', [ApiController::class, 'category_get_data'])->name('category-get-data');

  Route::post('/category-delete-data', [ApiController::class, 'category_delete_data'])->name('category-delete-data');

  Route::post('/category-insert-data', [ApiController::class, 'category_insert_data'])->name('category-insert-data');

  Route::get('/Category-show/{id}', [ApiController::class, 'Category_show'])->name('Category-show');

  Route::post('/category-update-data', [ApiController::class, 'category_update_data'])->name('category-update-data');

  Route::get('/most-loved', [ApiController::class, 'most_love_by_get'])->name('most-loved');

  Route::post('/most-loved-insert', [ApiController::class, 'most_loved_insert'])->name('most-loved-insert');

  Route::get('/most-love-edit/{id}', [ApiController::class, 'most_love_edit'])->name('most-love-edit');

  Route::post('/most-love-update', [ApiController::class, 'most_love_update'])->name('most-love-update');

  Route::get('/most-loved-delete/{id}', [ApiController::class, 'most_loved_delete'])->name('most-loved-delete');

  Route::get('/editor-picks-display', [ApiController::class, 'editor_picks_display'])->name('editor-picks-display');

  Route::post('/editor-picks-insert', [ApiController::class, 'editor_picks_insert'])->name('editor-picks-insert');

  Route::get('editor-picks-edit/{id}', [ApiController::class, 'editor_picks_edit'])->name('editor-picks-edit');

  Route::post('/editors-update', [ApiController::class, 'editors_update'])->name('editors-update');

  Route::get('/editors-delete/{id}', [ApiController::class, 'editors_delete'])->name('editors-delete');

  Route::get('/get-try-something', [ApiController::class, 'get_try_something'])->name('get-try-something');

  Route::post('/try-something-insert', [ApiController::class, 'try_something_insert'])->name('try-something-insert');

  Route::get('try-something-edit/{id}', [ApiController::class, 'try_something_edit'])->name('try-something-edit');

  Route::post('/try-update', [ApiController::class, 'try_update'])->name('try-update');

  Route::get('/try-delete/{id}', [ApiController::class, 'try_delete'])->name('try-delete');

  Route::get('/get-more-to-explore', [ApiController::class, 'get_more_to_explore'])->name('get-more-to-explore');

  Route::post('/more-to-insert', [ApiController::class, 'more_to_insert'])->name('more-to-insert');

  Route::get('more-to-explore-edit/{id}', [ApiController::class, 'more_to_explore_edit'])->name('more-to-explore-edit');

  Route::post('/more-to-explore-update', [ApiController::class, 'more_to_explore_update'])->name('more-to-explore-update');

  Route::get('/more-to-explore-delete/{id}', [ApiController::class, 'more_to_explore_delete'])->name('more-to-explorey-delete');

  Route::get('/browse-by-category-get', [ApiController::class, 'browse_by_category_get'])->name('browse-by-category-get');

  Route::post('/browse-by-category-insert', [ApiController::class, 'browse_by_category_insert'])->name('browse-by-category-insert');

  Route::get('browse-by-category-edit/{id}', [ApiController::class, 'browse_by_category_edit'])->name('browse-by-category-edit');

  Route::post('/browse-by-category-update', [ApiController::class, 'browse_by_category_update'])->name('browse-by-category-update');

  Route::get('/browse-by-category-delete/{id}', [ApiController::class, 'browse_by_category_delete'])->name('browse-by-category-delete');

  Route::get('/setting', [ApiController::class, 'setting'])->name('setting');

  Route::get('setting-edit/{id}', [ApiController::class, 'setting_edit'])->name('setting-edit');

  Route::post('/setting-update', [ApiController::class, 'setting_update'])->name('setting-update');

  Route::get('/banner', [ApiController::class, 'banner'])->name('banner');

  Route::post('/banner-insert', [ApiController::class, 'banner_insert'])->name('banner-insert');

  Route::get('banner-edit/{id}', [ApiController::class, 'banner_edit'])->name('banner-edit');

  Route::post('/banner-update', [ApiController::class, 'banner_update'])->name('banner-update');

  Route::get('/banner-delete/{id}', [ApiController::class, 'banner_delete'])->name('banner-delete');


  //E-Shopper//
  Route::get('/shop-banner-show', [ApiController::class, 'shop_banner_show'])->name('shop-banner-show');

  Route::post('/create-shop-banner', [ApiController::class, 'create_shop_banner'])->name('create-shop-banner');

  Route::get('shop-banner-edit/{id}', [ApiController::class, 'shop_banner_edit'])->name('shop-banner-edit');

  Route::post('/shop-banner-update', [ApiController::class, 'shop_banner_update'])->name('shop-banner-update');

  Route::get('/shop-banner-delete/{id}', [ApiController::class, 'shope_banner_delete'])->name('shope-banner-delete');

  Route::get('/featur-item-show', [ApiController::class, 'featur_item_show'])->name('featur-item-show');

  Route::post('/featur-item-create', [ApiController::class, 'featur_item_create'])->name('featur-item-create');

  Route::get('featur-item-edit/{id}', [ApiController::class, 'featur_item_edit'])->name('featur-item-edit');

  Route::post('/featur-item-update', [ApiController::class, 'featue_item_update'])->name('featue-item-update');

  Route::get('/featur-item-delete/{id}', [ApiController::class, 'featur_item_delete'])->name('featur-item-delete');

  Route::get('/recommended-item-show', [ApiController::class, 'recommended_item_show'])->name('recommended-item-show');

  Route::post('/recommended-item-create', [ApiController::class, 'recommended_item_create'])->name('featur-item-create');

  Route::get('recommended-item-edit/{id}', [ApiController::class, 'recommended_item_edit'])->name('recommended-item-edit');

  Route::post('/recommended-item-update', [ApiController::class, 'recommended_item_update'])->name('recommended-item-update');

  Route::get('/recommended-item-delete/{id}', [ApiController::class, 'recommended_item_delete'])->name('recommended-item-delete');

  Route::get('/t-shirt-show', [ApiController::class, 't_shirt_show'])->name('t-shirt-show');

  Route::post('/t-shirt-create', [ApiController::class, 't_shirt_create'])->name('t-shirt-create');

  Route::get('t-shirt-edit/{id}', [ApiController::class, 't_shirt_edit'])->name('t-shirt-edit');

  Route::post('/t-shirt-update', [ApiController::class, 't_shirt_update'])->name('t-shirt-update');

  Route::get('/t-shirt-delete/{id}', [ApiController::class, 't_shirt_delete'])->name('t-shirt-delete');

  Route::get('/blazers-show', [ApiController::class, 'blazers_how'])->name('blazers-show');

  Route::post('/blazers-create', [ApiController::class, 'blazers_create'])->name('blazers-create');

  Route::get('blazers-edit/{id}', [ApiController::class, 'blazers_edit'])->name('blazers-edit');

  Route::post('/blazers-update', [ApiController::class, 'blazers_update'])->name('blazers-update');

  Route::get('/blazers-delete/{id}', [ApiController::class, 'blazers_delete'])->name('blazers-delete');

  Route::get('/blazers-show', [ApiController::class, 'blazers_how'])->name('blazers-show');

  Route::get('/sunglass-show', [ApiController::class, 'sunglass_show'])->name('sunglass-show');

  Route::post('/sunglass-create', [ApiController::class, 'sunglass_create'])->name('sunglass-create');

  Route::get('sunglass-edit/{id}', [ApiController::class, 'sunglass_edit'])->name('sunglass-edit');

  Route::post('/sunglass-update', [ApiController::class, 'sunglass_update'])->name('sunglass-update');

  Route::get('/sunglass-delete/{id}', [ApiController::class, 'sunglass_delete'])->name('sunglass-delete');

  Route::get('/kids-data-show', [ApiController::class, 'kids_data_show'])->name('kids-data-show');

  Route::post('/kids-data-create', [ApiController::class, 'kids_data_create'])->name('kids-data-create');

  Route::get('kids-data-edit/{id}', [ApiController::class, 'kids_data_edit'])->name('kids-data-edit');

  Route::post('/kids-data-update', [ApiController::class, 'kids_data_update'])->name('kids-data-update');

  Route::get('/kids-data-delete/{id}', [ApiController::class, 'kids_data_delete'])->name('kids-data-delete');

  Route::get('/polo-shirt-show', [ApiController::class, 'polo_shirt_show'])->name('polo-shirt-show');

  Route::post('/polo-shirt-create', [ApiController::class, 'polo_shirt_create'])->name('polo-shirt-create');

  Route::get('polo-shirt-edit/{id}', [ApiController::class, 'polo_shirt_edit'])->name('polo-shirt-edit');

  Route::post('/polo-shirt-update', [ApiController::class, 'polo_shirt_update'])->name('polo-shirt-update');
});
