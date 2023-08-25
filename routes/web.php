<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatkulController;
use Illuminate\Contracts\Session\Session;
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




//Route::get('/', [HalamanController::class, 'index']);
//Route::get('/kontak', [HalamanController::class, 'kontak']);
//Route::get('/tentang', [HalamanController::class, 'tentang']);

Route::resource('matkul', MatkulController::class)->middleware('isLogin');

Route::get('/auth', [AuthController::class, 'index'])->middleware('isTamu');
Route::post('/auth/login', [AuthController::class, 'login'])->middleware('isTamu');
Route::get('/auth/logout', [AuthController::class, 'logout']);
Route::get('/auth/register', [AuthController::class, 'register'])->middleware('isTamu');
Route::post('/auth/create', [AuthController::class, 'create'])->middleware('isTamu');

Route::middleware('auth')->group(function () {
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');
});
Route::get('/', function () {
    return view('auth/welcome');
})->middleware('isTamu');
