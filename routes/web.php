<?php

use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeLeaveRequestsController;
use App\Http\Controllers\EmployeeLeavesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeeScoresController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RecruitmentsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\WelcomeController;
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


Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false
]);


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/employees-data', [EmployeesController::class, 'index'])->name('employees-data');
Route::get('/employees-data/create', [EmployeesController::class, 'create'])->name('employees-data.create');
Route::get('/employees-data/print', [EmployeesController::class, 'print'])->name('employees-data.print');
Route::get('/employees-data/{employee}', [EmployeesController::class, 'show'])->name('employees-data.show');
Route::get('/employees-data/{employee}/edit', [EmployeesController::class, 'edit'])->name('employees-data.edit');
Route::post('/employees-data', [EmployeesController::class, 'store'])->name('employees-data.store');
Route::put('/employees-data/{employee}', [EmployeesController::class, 'update'])->name('employees-data.update');
Route::delete('/employees-data/{employee}', [EmployeesController::class, 'destroy'])->name('employees-data.destroy');
Route::get('/departments-data', [DepartmentsController::class, 'index'])->name('departments-data');
Route::get('/departments-data/create', [DepartmentsController::class, 'create'])->name('departments-data.create');
Route::get('/departments-data/print', [DepartmentsController::class, 'print'])->name('departments-data.print');
Route::get('/departments-data/{department}', [DepartmentsController::class, 'show'])->name('departments-data.show');
Route::get('/departments-data/{department}/edit', [DepartmentsController::class, 'edit'])->name('departments-data.edit');
Route::post('/departments-data', [DepartmentsController::class, 'store'])->name('departments-data.store');
Route::put('/departments-data/{department}', [DepartmentsController::class, 'update'])->name('departments-data.update');
Route::delete('/departments-data/{department}', [DepartmentsController::class, 'destroy'])->name('departments-data.destroy');
Route::get('/positions-data', [PositionsController::class, 'index'])->name('positions-data');
Route::get('/positions-data/create', [PositionsController::class, 'create'])->name('positions-data.create');
Route::get('/positions-data/print', [PositionsController::class, 'print'])->name('positions-data.print');
Route::get('/positions-data/{position}', [PositionsController::class, 'show'])->name('positions-data.show');
Route::get('/positions-data/{position}/edit', [PositionsController::class, 'edit'])->name('positions-data.edit');
Route::post('/positions-data', [PositionsController::class, 'store'])->name('positions-data.store');
Route::put('/positions-data/{position}', [PositionsController::class, 'update'])->name('positions-data.update');
Route::delete('/positions-data/{position}', [PositionsController::class, 'destroy'])->name('positions-data.destroy');
Route::get('/employees-performance-score', [EmployeeScoresController::class, 'index'])->name('employees-performance-score');
Route::get('/employees-performance-score/create', [EmployeeScoresController::class, 'create'])->name('employees-performance-score.create');
Route::get('/employees-performance-score/print', [EmployeeScoresController::class, 'print'])->name('employees-performance-score.print');
Route::get('/employees-performance-score/{employeeScore}', [EmployeeScoresController::class, 'show'])->name('employees-performance-score.show');
Route::get('/employees-performance-score/{employeeScore}/edit', [EmployeeScoresController::class, 'edit'])->name('employees-performance-score.edit');
Route::post('/employees-performance-score', [EmployeeScoresController::class, 'store'])->name('employees-performance-score.store');
Route::put('/employees-performance-score/{employeeScore}', [EmployeeScoresController::class, 'update'])->name('employees-performance-score.update');
Route::delete('/employees-performance-score/{employeeScore}', [EmployeeScoresController::class, 'destroy'])->name('employees-performance-score.destroy');
Route::get('/employees-leave-request', [EmployeeLeaveRequestsController::class, 'index'])->name('employees-leave-request');
Route::get('/employees-leave-request/create', [EmployeeLeaveRequestsController::class, 'create'])->name('employees-leave-request.create');
Route::get('/employees-leave-request/print', [EmployeeLeaveRequestsController::class, 'print'])->name('employees-leave-request.print');
Route::get('/employees-leave-request/{employeeLeaveRequest}', [EmployeeLeaveRequestsController::class, 'show'])->name('employees-leave-request.show');
Route::get('/employees-leave-request/{employeeLeaveRequest}/edit', [EmployeeLeaveRequestsController::class, 'edit'])->name('employees-leave-request.edit');
Route::post('/employees-leave-request', [EmployeeLeaveRequestsController::class, 'store'])->name('employees-leave-request.store');
Route::put('/employees-leave-request/{employeeLeaveRequest}', [EmployeeLeaveRequestsController::class, 'update'])->name('employees-leave-request.update');
Route::delete('/employees-leave-request/{employeeLeaveRequest}', [EmployeeLeaveRequestsController::class, 'destroy'])->name('employees-leave-request.destroy');
Route::get('/attendances', [AttendancesController::class, 'index'])->name('attendances');
Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements');
Route::get('/recruitments', [RecruitmentsController::class, 'index'])->name('recruitments');
Route::get('/users', [UsersController::class, 'index'])->name('users');
Route::get('/roles', [RolesController::class, 'index'])->name('roles');
Route::get('/profile', [ProfilesController::class, 'index'])->name('profile');
