<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

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
Route::group(['middleware' => ['auth']], function () {
    Route::resource('permissions', PermissionController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::resource('roles', RoleController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
    Route::resource('users', UserController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
});

