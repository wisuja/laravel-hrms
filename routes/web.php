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
use App\Http\Controllers\LogsController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RecruitmentCandidatesController;
use App\Http\Controllers\RecruitmentsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ScoreCategoriesController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome')->middleware('guest');
Route::get('/welcome/announcements', [WelcomeController::class, 'announcements'])->name('welcome.announcements')->middleware('guest');
Route::get('/welcome/announcements/{announcement}', [WelcomeController::class, 'announcementShow'])->name('welcome.announcements.show')->middleware('guest');
Route::get('/welcome/recruitments', [WelcomeController::class, 'recruitments'])->name('welcome.recruitments')->middleware('guest');
Route::get('/welcome/recruitments/{recruitment}', [WelcomeController::class, 'recruitmentShow'])->name('welcome.recruitments.show')->middleware('guest');
Route::post('/recruitment-candidates', [RecruitmentCandidatesController::class, 'store'])->name('recruitment-candidates.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('check.access')->group(function() {
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
    Route::get('/attendances/print', [AttendancesController::class, 'print'])->name('attendances.print');
    Route::post('/attendances', [AttendancesController::class, 'store'])->name('attendances.store');
    Route::put('/attendances', [AttendancesController::class, 'update'])->name('attendances.update');
    Route::get('/announcements', [AnnouncementsController::class, 'index'])->name('announcements');
    Route::get('/announcements/create', [AnnouncementsController::class, 'create'])->name('announcements.create');
    Route::get('/announcements/print', [AnnouncementsController::class, 'print'])->name('announcements.print');
    Route::get('/announcements/{announcement}', [AnnouncementsController::class, 'show'])->name('announcements.show');
    Route::get('/announcements/{announcement}/edit', [AnnouncementsController::class, 'edit'])->name('announcements.edit');
    Route::post('/announcements', [AnnouncementsController::class, 'store'])->name('announcements.store');
    Route::put('/announcements/{announcement}', [AnnouncementsController::class, 'update'])->name('announcements.update');
    Route::delete('/announcements/{announcement}', [AnnouncementsController::class, 'destroy'])->name('announcements.destroy');
    Route::get('/recruitments', [RecruitmentsController::class, 'index'])->name('recruitments');
    Route::get('/recruitments/create', [RecruitmentsController::class, 'create'])->name('recruitments.create');
    Route::get('/recruitments/print', [RecruitmentsController::class, 'print'])->name('recruitments.print');
    Route::get('/recruitments/{recruitment}', [RecruitmentsController::class, 'show'])->name('recruitments.show');
    Route::get('/recruitments/{recruitment}/edit', [RecruitmentsController::class, 'edit'])->name('recruitments.edit');
    Route::post('/recruitments', [RecruitmentsController::class, 'store'])->name('recruitments.store');
    Route::put('/recruitments/{recruitment}', [RecruitmentsController::class, 'update'])->name('recruitments.update');
    Route::delete('/recruitments/{recruitment}', [RecruitmentsController::class, 'destroy'])->name('recruitments.destroy');
    Route::get('/score-categories', [ScoreCategoriesController::class, 'index'])->name('score-categories');
    Route::get('/score-categories/create', [ScoreCategoriesController::class, 'create'])->name('score-categories.create');
    Route::get('/score-categories/print', [ScoreCategoriesController::class, 'print'])->name('score-categories.print');
    Route::get('/score-categories/{scoreCategory}/edit', [ScoreCategoriesController::class, 'edit'])->name('score-categories.edit');
    Route::post('/score-categories', [ScoreCategoriesController::class, 'store'])->name('score-categories.store');
    Route::put('/score-categories/{scoreCategory}', [ScoreCategoriesController::class, 'update'])->name('score-categories.update');
    Route::delete('/score-categories/{scoreCategory}', [ScoreCategoriesController::class, 'destroy'])->name('score-categories.destroy');
    Route::get('/logs', [LogsController::class, 'index'])->name('logs');
    Route::get('/logs/print', [LogsController::class, 'print'])->name('logs.print');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/print', [UsersController::class, 'print'])->name('users.print');
    Route::get('/roles', [RolesController::class, 'index'])->name('roles');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::get('/roles/print', [RolesController::class, 'print'])->name('roles.print');
    Route::get('/roles/{role}', [RolesController::class, 'show'])->name('roles.show');
    Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
    Route::put('/roles/{role}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RolesController::class, 'destroy'])->name('roles.destroy');
    Route::get('/profile', [ProfilesController::class, 'index'])->name('profile');
    Route::put('/profile/{user}', [ProfilesController::class, 'update'])->name('profile.update');    
});
