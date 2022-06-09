<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('index');
});
Route::get('/edit_profile', [App\Http\Controllers\FrontendController::class, 'edit_profile'])->name('edit_profile');

Route::get('/event_details', [App\Http\Controllers\FrontendController::class, 'event_details'])->name('event_details');

Route::get('/event_listing', [App\Http\Controllers\FrontendController::class, 'event_listing'])->name('event_listing');

Route::get('/how_to_score_points', [App\Http\Controllers\FrontendController::class, 'how_to_score_points'])->name('how_to_score_points');

Route::get('/kids', [App\Http\Controllers\FrontendController::class, 'kids'])->name('kids');

Route::get('/my_favourite', [App\Http\Controllers\FrontendController::class, 'my_favourite'])->name('my_favourite');

Route::get('/search_results', [App\Http\Controllers\FrontendController::class, 'search_results'])->name('search_results');

Route::get('/user_profile', [App\Http\Controllers\FrontendController::class, 'user_profile'])->name('user_profile');

Route::get('/inspirations-data/{id}', [App\Http\Controllers\FrontendController::class, 'inspirations_data'])->name('inspirations-data');

Route::get('/inspirations-all-data', [App\Http\Controllers\FrontendController::class, 'inspirations_all_data'])->name('inspirations-all-data');

Route::get('/category-data/{id}', [App\Http\Controllers\FrontendController::class, 'category_data'])->name('category-data');



Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('Admin/Home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

    Route::post('/admin/Edit-profile', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('admin.edit_profile');
});

Route::get('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');

Route::post('/add-catagory', [App\Http\Controllers\HomeController::class, 'add_catagory'])->name('add-catagory');

Route::post('/categories-delete', [App\Http\Controllers\HomeController::class, 'categories_delete'])->name('categories-delete');

Route::post('/category-update', [App\Http\Controllers\HomeController::class, 'category_update'])->name('category-update');

Route::get('/inspiration', [App\Http\Controllers\HomeController::class, 'inspiration'])->name('inspiration');

Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

Route::post('/create-data', [App\Http\Controllers\HomeController::class, 'create_data'])->name('create-data');

Route::get('/edit-data/{id}', [App\Http\Controllers\HomeController::class, 'edit_data'])->name('edit-data');

Route::post('/update-data', [App\Http\Controllers\HomeController::class, 'update_data'])->name('update-data');

Route::post('/delete-data', [App\Http\Controllers\HomeController::class, 'delete_data'])->name('delete-data');

Route::get('auth/google', [App\Http\Controllers\HomeController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [App\Http\Controllers\HomeController::class, 'handleGoogleCallback']);
