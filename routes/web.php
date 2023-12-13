<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\UserController;
use App\Models\Proposal;
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
    return redirect('/dashboard');
});

Route::resource('/dashboard', ProposalController::class)->except('create', 'edit', 'destroy')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/setting', function() {
    return view('setting.index');
})->middleware('auth');

Route::post('/user', [UserController::class, 'store'])->middleware('auth');
Route::post('/user/{id}', [UserController::class, 'update'])->middleware('auth');