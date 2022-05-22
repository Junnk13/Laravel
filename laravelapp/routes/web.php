<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\UserCommentController;
use App\Http\Controllers\Admin\IndexController as AdminCtrl;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryCtrl;
use \App\Http\Controllers\Admin\NewsController as AdminNewsCtrl;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function (string $name) {
    return "Hello, " . $name;
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get("/",[AdminCtrl::class,'index'])->name('index');
    Route::resource('/category', AdminCategoryCtrl::class);
    Route::resource("/news", AdminNewsCtrl::class);
});

Route::group(['prefix' => 'infonews', 'as' => 'infonews.'], function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::resource("/comment", UserCommentController::class);
    Route::post('/',[NewsController::class,'getUrlData'])->name('getUrlData');
    Route::get('/category', [NewsController::class, 'category'])->name('category');
    Route::get('/category/{idCategory}', [NewsController::class, 'news'])->name('catnews');
    Route::get('/category/news/{id}', [NewsController::class, 'show'])
        ->where('id', "\d+")
        ->name("show");
});
