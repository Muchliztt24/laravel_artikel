<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\FrontController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontController::class,'index']);

Route::get('/daftar', [FrontController::class, 'daftar'])->name('page.daftar');

Route::get('/jenis/{id}', [FrontController::class, 'sortir'])->name('page.sortir');

Route::get('/anime/{id}', [FrontController::class, 'single'])->name('page.single');

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('jenis', JenisController::class);
Route::resource('anime', AnimeController::class);

