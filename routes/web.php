<?php

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

Route::get('/dashboard', function () {
    return view('introduction');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();



//Route Pengelolaan Produk
Route::get("/tambahproduk", [App\Http\Controllers\Produk\ProdukController::class, 'index'] );
Route::get("/tambahkategori", [App\Http\Controllers\Produk\KategoriController::class, 'index'] );
Route::get("/tambahmerek", [App\Http\Controllers\Produk\MerekController::class, 'index'] );


//Route Pengelolaan Produk (assignment)
Route::post("/injectProduk", [App\Http\Controllers\Produk\ProdukController::class, 'tambahProduk'])->name("produk.store");
Route::post("/injectKategori", [App\Http\Controllers\Produk\KategoriController::class, 'tambahkategori'])->name("kategori.store");
Route::post("/injectMerek", [App\Http\Controllers\Produk\MerekController::class, 'tambahmerek'])->name("merek.store");


Route::get("/cekHelper", [App\Http\Controllers\ProdukController::class, 'tambahProduk'])->name("tambahProduk");




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
