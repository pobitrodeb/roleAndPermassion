<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashbaordControllerr;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\TestController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [DashbaordControllerr::class, 'index'])->name('admin.dashboard');
    Route::resource('roles', RoleController::class, ['names' => 'admin.roles']);
});
