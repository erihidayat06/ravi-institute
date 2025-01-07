<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurnalController;

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
    return view('index');
})->middleware('guest');
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth');


Route::resource('/admin/jurnal', JurnalController::class)->middleware('auth');
Route::put('/admin/jurnal/status/{jurnal:id}', [JurnalController::class, 'status'])->middleware('auth');
Route::get('/jurnal/{jurnal:id_jurnal}', [JurnalController::class, 'show']);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
