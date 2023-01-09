<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as IndexControllerAdmin;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobFailController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\QueueWork;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Auth::routes([
    'login' => true,
    'logout' => true,
    'register' => true,
    'reset' => true,
    'confirm' => false,
    'verify' => true,
]);

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('/account', AccountIndexController::class)->name('account');
        Route::resource('user', AccountController::class);
        Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {
            Route::get('/parser', ParserController::class)->name('parser');
            Route::get('/job', JobController::class)->name('job');
            Route::get('/jobFail', JobFailController::class)->name('jobFail');
            Route::resource('resources', IndexControllerAdmin::class);
            Route::resource('notes', NoteController::class);
            Route::resource('queue', QueueWork::class);
            Route::resource('categories', AdminCategoryController::class);
            Route::resource('news', AdminNewsController::class);
            Route::resource('users', AdminUserController::class);
        });
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/redirect/{driver}', [SocialController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.auth.redirect');
    Route::get('/auth/callback/{driver}', [SocialController::class, 'callback'])
        ->where('driver', '\w+');
});



