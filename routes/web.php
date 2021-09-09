<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware gr
oup. Now create something great!
|
*/

//this is the first page, it will go to Customercontroller index function
Route::get('/', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::post('/', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
Route::post('/check', [App\Http\Controllers\CustomerController::class, 'appointCheck'])->name('customer.appointCheck');

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
Route::get('/today', [App\Http\Controllers\AdminController::class, 'today'])->name('admin.today');
Route::get('/today/{id}', [App\Http\Controllers\AdminController::class, 'today_delete'])->name('today.delete');
Route::get('/upcoming', [App\Http\Controllers\AdminController::class, 'upcoming'])->name('admin.upcoming');
Route::get('/upcoming/{id}', [App\Http\Controllers\AdminController::class, 'upcoming_delete'])->name('upcoming.delete');
Route::get('/prev', [App\Http\Controllers\AdminController::class, 'prev'])->name('admin.prev');
Route::get('/prev/{id}', [App\Http\Controllers\AdminController::class, 'prev_delete'])->name('prev.delete');

Route::get('/changepassword', [App\Http\Controllers\AdminController::class, 'changepassword'])->name('admin.changepassword');
Route::post('/changepassword', [App\Http\Controllers\AdminController::class, 'resetpassword'])->name('admin.resetpassword');
