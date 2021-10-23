<?php
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DiskController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StreamController;

// use App\Http\Controllers\Dashboard\AuthController;
// use App\Http\Controllers\Dashboard\IndexController;
// use App\Http\Controllers\Dashboard\PagesController;
// use App\Http\Controllers\Dashboard\RolesController;
// use App\Http\Controllers\Dashboard\UsersController;
// use App\Http\Controllers\Dashboard\PermissionController;
// use App\Http\Controllers\Dashboard\FilemanagerController;

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

// Route::get('/', [Controller::class, 'index']);

Route::get('/', [HomeController::class, 'index']);

// Route::get('/auth', [AuthController::class, 'index'])->name('dashboard.login');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('dashboard.login');
// Route::get('/auth/resetpassword', [AuthController::class, 'resetpassword']);


Route::resource('/lead', LeadController::class);
Route::resource('/deal', DealController::class);
Route::resource('/contact', ContactController::class);
Route::resource('/company', CompanyController::class);
Route::resource('/task', TaskController::class);
Route::resource('/project', ProjectController::class);
Route::resource('/stream', StreamController::class);
Route::resource('/disk', DiskController::class);
Route::resource('/group', GroupController::class);
Route::resource('/department', DepartmentController::class);

Route::resource('/users', UsersController::class);
Route::resource('/roles', RolesController::class);
Route::resource('/permission', PermissionController::class);

require __DIR__.'/auth.php';
