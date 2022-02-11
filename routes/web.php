<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('login/facebook', [HomeController::class, 'facebookRedirect'])->name('login.facebook');

Route::get('login/facebook/callback', [HomeController::class, 'loginWithFacebook']);
Route::get('login/google', [HomeController::class, 'GoogleRedirect'])->name('login.google');

Route::get('login/google/callback', [HomeController::class, 'loginWithGoogle']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('sp/{id}', [HomeController::class, 'sploai']);
Route::get('ctsp/{id}', [HomeController::class, 'ctsp']);

Route::get('addcart/{id}', [HomeController::class, 'addcart']);
Route::get('showcart', [HomeController::class, 'showcart']);
Route::get('deletecart/{id}', [HomeController::class, 'deletecart']);
Route::get('multicart/{id}/multi/{sl}', [HomeController::class, 'multicart']);

Route::get('/swdathang', [HomeController::class, 'swdathang'])->name('swdathang');

Route::get('/TTKH', [HomeController::class, 'TTKH'])->name('ttkh');
Route::get('/swdh', [HomeController::class, 'dathangajax']);
Route::get('multiajax/{id}/multi/{sl}', [HomeController::class, 'multiajax']);

Route::POST('/dathang', [HomeController::class, 'adddonhang']);
Route::get('/diachi', [HomeController::class, 'diachi'])->name('diachi');
Route::POST('/address', [HomeController::class, 'address']);
Route::get('huydon/{id}', [HomeController::class, 'huydon']);
Route::post('logincontrol', [HomeController::class, 'logincontroller']);

Route::post('resign', [HomeController::class, 'registeraccount']);
Route::post('/postchat', [HomeController::class, 'postchat']);
Route::get('showchat', [HomeController::class, 'showchat']);
Route::get('loadchat', [HomeController::class, 'loadslchat']);
Route::get('showsearch/{value}', [HomeController::class, 'showsearch']);
Route::get('doimk', [HomeController::class, 'doimk']);
Route::POST('postmk', [HomeController::class, 'postmk']);