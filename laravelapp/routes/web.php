<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCtrl;
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
    Route::resource('/category', AdminCtrl::class);
    Route::resource("/news", AdminNewsCtrl::class);
});

Route::get('infonews/',[NewsController::class,'index'])->name('news.info');
Route::get('infonews/category', [NewsController::class, 'category'])->name('news.category');
Route::get('infonews/category/{idCategory}', [NewsController::class, 'news'])->name('news.catnews');
Route::get('infonews/category/news/{id}', [NewsController::class, 'show'])
    ->where('id', "\d+")
    ->name("news.show");
