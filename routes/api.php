<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ApiController
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

Route::post('/login', [App\Http\Controllers\ApiController::class, 'login'])->name('login');

Route::post('/signup', [App\Http\Controllers\ApiController::class, 'signup'])->name('signup');

Route::get('/inspirationp-get-data', [App\Http\Controllers\ApiController::class, 'inspiration_get_data'])->name('inspiration-get-data');

Route::post('/inspirationp-insert-data', [App\Http\Controllers\ApiController::class, 'inspiration_insert_data'])->name('inspiration-insert-data');

Route::post('/inspirationp-update-data', [App\Http\Controllers\ApiController::class, 'inspiration_update_data'])->name('inspiration-update-data');

Route::post('/inspirationp-delete-data', [App\Http\Controllers\ApiController::class, 'inspiration_delete_data'])->name('inspiration-delete-data');

Route::get('/category-get-data', [App\Http\Controllers\ApiController::class, 'category_get_data'])->name('category-get-data');

Route::post('/category-delete-data', [App\Http\Controllers\ApiController::class, 'category_delete_data'])->name('category-delete-data');

Route::post('/category-insert-data', [App\Http\Controllers\ApiController::class, 'category_insert_data'])->name('category-insert-data');

Route::post('/category-update-data', [App\Http\Controllers\ApiController::class, 'category_update_data'])->name('category-update-data');