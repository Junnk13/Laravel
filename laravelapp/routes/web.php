<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\UserCommentController;
use App\Http\Controllers\Admin\IndexController as AdminCtrl;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryCtrl;
use \App\Http\Controllers\Admin\NewsController as AdminNewsCtrl;
use \App\Http\Controllers\Admin\SoursesController as AdminSoursesCtrl;
use \App\Http\Controllers\Account\IndexController as AccountCtrl;
use \App\Http\Controllers\Admin\ProfileController as ProfileCtrl;
use \App\Http\Controllers\Admin\ParserController;
use \App\Http\Controllers\SocialController;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountCtrl::class)->name('account');
    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get("/", [AdminCtrl::class, 'index'])->name('index');
        Route::get("/parser", ParserController::class)->name('parser');
        Route::resource('/category', AdminCategoryCtrl::class);
        Route::resource("/news", AdminNewsCtrl::class);
        Route::resource("/sourses", AdminSoursesCtrl::class);
        Route::resource("/profile", ProfileCtrl::class);
        // Route::match(['get', 'post'], '/change/{id}', [ProfileIndexCtrl::class,'index'])->name('change');
    });
});
Route::group(['prefix' => 'infonews', 'as' => 'infonews.'], function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::resource("/comment", UserCommentController::class);
    Route::post('/', [NewsController::class, 'getUrlData'])->name('getUrlData');
    Route::get('/category', [NewsController::class, 'category'])->name('category');
    Route::get('/category/{idCategory}', [NewsController::class, 'newsList'])->name('newsList');
    Route::get('/category/news/{id}', [NewsController::class, 'show'])
        ->where('id', "\d+")
        ->name("show");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])->where('driver', '\w+')->name('social.redirect');
    Route::any('/auth/{driver}/callback', [SocialController::class, 'callback'])->where('driver', '\w+')->name('social.callback');
});
