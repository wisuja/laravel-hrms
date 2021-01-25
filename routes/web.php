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
Route::get('/employees-data', [PagesController::class, 'employeesData'])->name('employees-data');
Route::get('/departments-data', [PagesController::class, 'departmentsData'])->name('departments-data');
Route::get('/positions-data', [PagesController::class, 'positionsData'])->name('positions-data');
Route::get('/employees-performance-score', [PagesController::class, 'employeesPerformanceScore'])->name('employees-performance-score');
Route::get('/employees-leave', [PagesController::class, 'employeesLeave'])->name('employees-leave');
Route::get('/attendances', [PagesController::class, 'attendances'])->name('attendances');
Route::get('/announcements', [PagesController::class, 'announcements'])->name('announcements');
Route::get('/recruitments', [PagesController::class, 'recruitments'])->name('recruitments');
Route::get('/users', [PagesController::class, 'users'])->name('users');
Route::get('/roles', [PagesController::class, 'roles'])->name('roles');
Route::get('/profile', [PagesController::class, 'profile'])->name('profile');
