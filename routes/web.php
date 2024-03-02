<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login sebelum akses 
Route::middleware('auth')->group(function () {
   //rute penerbangan index
Route::get('penerbangan',
[App\Http\Controllers\PenerbanganController::class, 'index'])->name('penerbangan.index')->middleware('admin');
//rute penerbangan create
Route::get('penerbangan/create',
[App\Http\Controllers\PenerbanganController::class, 'create'])->name('penerbangan.create')->middleware('admin');
//rute penerbangan store
Route::post('penerbangan',
[App\Http\Controllers\PenerbanganController::class, 'store'])->name('penerbangan.store')->middleware('admin');
//rute penerbangan edit 
Route::get('penerbangan/{id}/edit',
[App\Http\Controllers\PenerbanganController::class, 'edit'])->name('penerbangan.edit')->middleware('admin');
//rute penerbangan update
Route::put('penerbangan/{id}',
[App\Http\Controllers\PenerbanganController::class, 'update'])->name('penerbangan.update')->middleware('admin');
//rute penerbangan delete
Route::get('penerbangan/{id}',
[App\Http\Controllers\PenerbanganController::class, 'destroy'])->name('penerbangan.destroy')->middleware('admin');

// route transaksi index
Route::get('transaksi',
    [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('transaksi/create',
    [App\Http\Controllers\TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi/store',[App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('transaksi/edit/{id}', [App\Http\Controllers\TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::get('transaksi/destroy/{id}',[App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.destroy');
Route::put('transaksi/update/{id}', [App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi.update');
Route::get('checkout',
    [App\Http\Controllers\TransaksiController::class, 'checkout'])->name('transaksi.checkout');

//checkout 
Route::post('checkoutstore',
    [App\Http\Controllers\TransaksiController::class, 'checkout_store'])->name('transaksi.checkout_store');
});
