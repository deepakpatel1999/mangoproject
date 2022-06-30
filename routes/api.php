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

});
