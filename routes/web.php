<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController as ControllersDonationController;
use App\Http\Controllers\RoleControllerController;
use App\Http\Controllers\User\DonationController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [DashboardController::class, 'index']);

Route::get('/check', function(){
    if (Auth::user()->role->nama == 'admin') {
        return redirect('/home');
    }else{
        return redirect('/');
    }
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('masuk');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('daftar');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('donation', ControllersDonationController::class);
Route::get('/riwayat-donasi', function(){
    $transaction = Transaction::where('user_id', Auth::user()->id)->get();

    return view('pengguna.riwayat-donasi', compact('transaction'));
});

Route::resource('role', RoleControllerController::class);
Route::resource('user', UserController::class);
Route::resource('donasi', DonationController::class);
Route::post('/donasi/transaksi', [DonationController::class, 'transaksi'])->name('donasi.transaksi');