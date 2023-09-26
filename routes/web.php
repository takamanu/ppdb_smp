<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BisnisController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DatapokokController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrasiUlangController;
use App\Models\RegistrasiUlang;

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

// Route::get('/persediaan', [BisnisController::class, 'stock']);
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){

// Route::prefix('persediaan')->middleware('auth')->group(function(){
//     Route::resource('/transaksi', TransaksiController::class);
//     Route::resource('/persediaan', ProdukController::class);
//     Route::resource('/agen', AgenController::class);

// });
    
// });

Route::resource('/registrasi', RegistrasiUlangController::class);
Route::resource('/payment', PaymentController::class);
// Route::post('/daftar', [DatapokokController::class, 'store']);
// Route::resource('/datapokok', DatapokokController::class);


Route::middleware(['auth'])->group(function(){
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/persediaan', ProdukController::class);
    Route::resource('/agen', AgenController::class);
    Route::get('/siswa', 'SiswaController@index')->name('siswa');
    Route::resource('/siswa', SiswaController::class);
    // Route::get('/daftar', [AgenController::class, 'create']);
    Route::get('/agen/cetak/{id}', [AgenController::class, 'cetak']);
    Route::resource('/persediaan', StockController::class);
    Route::resource('/produk', ProdukController::class);
    Route::get('/katalog', [KatalogController::class, 'index']);
    // Route::resource('/register', RegistersUsers::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/registrasi_ulang', RegistrasiUlangController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'indexsiswa'])->name('siswahome');

