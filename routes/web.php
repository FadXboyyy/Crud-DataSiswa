<?php

use App\Http\Controllers\KontakController;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

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
    $jumlahsiswa = Siswa::count();
    $jumlahsiswacowok = Siswa::where('jeniskelamin','cowok')->count();
    $jumlahsiswacewek = Siswa::where('jeniskelamin','cewek')->count();
    return view('welcome',compact('jumlahsiswa','jumlahsiswacowok','jumlahsiswacewek'));
})->middleware('auth')->name('welcome');
Route::get('/Siswa',[SiswaController::class ,'index'])->name('Siswa')->middleware('auth');

Route::get('/TambahSiswa',[SiswaController::class ,'TambahSiswa'])->name('TambahSiswa')->middleware('auth');

Route::get('/insertdata',[SiswaController::class ,'insertdata'])->name('insertdata')->middleware('auth');

Route::get('/tampilandata/{id}',[SiswaController::class ,'tampilandata'])->name('tampilandata')->middleware('auth');

Route::post('/updatedata/{id}',[SiswaController::class ,'updatedata'])->name('updatedata')->middleware('auth');

Route::get('/delete/{id}',[SiswaController::class ,'delete'])->name('delete')->middleware('auth');

Route::get('/login',[LoginController::class ,'login'])->name('login');
Route::post('/loginproses',[LoginController::class ,'loginproses'])->name('loginproses');

Route::get('/register',[LoginController::class ,'register'])->name('register');
Route::post('/registeruser',[LoginController::class ,'registeruser'])->name('registeruser');


Route::get('/logout',[LoginController::class ,'logout'])->name('logout');

Route::get('/kontak', 'kontak@showContactForm');
Route::post('/kontaksubmit', 'kontak@sendMail');




