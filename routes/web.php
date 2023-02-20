<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ElectDataController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('parties', PartyController::class);
Route::resource('datas', ElectDataController::class);
Route::get('view-result', [ElectDataController::class, 'viewResult'])->name('datas.view');
Route::post('view-result', [ElectDataController::class, 'search'])->name('datas.search');