<?php

use App\Http\Controllers\PagesController;
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


Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false
]);


Route::get('/', [PagesController::class, 'index'])->name('welcome');
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
