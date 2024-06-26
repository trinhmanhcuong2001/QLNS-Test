<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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
//Country Routes
Route::prefix('countries')->group(function() {
    Route::get('index', [CountryController::class, 'index']);
    Route::get('create', [CountryController::class, 'create']);
    Route::post('create', [CountryController::class, 'store']);
    Route::get('edit/{country}', [CountryController::class, 'edit']);
    Route::post('edit/{country}', [CountryController::class, 'update']);
    Route::get('delete/{country}', [CountryController::class, 'destroy']);
});
//User Routes
Route::prefix('users')->group(function () {
    Route::get('index', [UserController::class, 'index']);
    Route::get('create', [UserController::class, 'create']);
    Route::post('create', [UserController::class, 'store']);
    Route::get('edit/{user}', [UserController::class, 'edit']);
    Route::put('edit/{user}', [UserController::class, 'update']);
    Route::get('delete/{user}', [UserController::class, 'destroy']);
    Route::post('addRole', [UserController::class, 'addRole']);
    Route::DELETE('removeRole', [UserController::class, 'removeRole']);
});
//Person Routes
Route::prefix('people')->group(function (){
    Route::get('create/user_id={user}', [PersonController::class, 'create']);
    Route::post('create/user_id={user}', [PersonController::class, 'store']);
    Route::get('detail/{person}', [PersonController::class, 'detail']);
    Route::get('edit/{person}', [PersonController::class, 'edit']);
    Route::put('edit/{person}', [PersonController::class, 'update']);
});
//Company Routes
Route::prefix('companies')->group(function (){
    Route::get('index', [CompanyController::class, 'index']);
    Route::get('create', [CompanyController::class, 'create']);
    Route::post('create', [CompanyController::class, 'store']);
    Route::get('edit/{company}', [CompanyController::class, 'edit']);
    Route::put('edit/{company}', [CompanyController::class, 'update']);
    Route::get('delete/{company}', [CompanyController::class, 'destroy']);
});
//Role Routes
Route::prefix('roles')->group(function (){
    Route::get('index', [RoleController::class, 'index']);
    Route::get('create', [RoleController::class, 'create']);
    Route::post('create', [RoleController::class, 'store']);
    Route::get('edit/{role}', [RoleController::class, 'edit']);
    Route::put('edit/{role}', [RoleController::class, 'update']);
    Route::get('delete/{role}', [RoleController::class, 'destroy']);
});
// Department Routes
Route::prefix('departments')->group(function (){
    Route::get('index', [DepartmentController::class, 'index']);
    Route::get('create', [DepartmentController::class, 'create']);
    Route::post('create', [DepartmentController::class, 'store']);
    Route::get('edit/{department}', [DepartmentController::class, 'edit']);
    Route::put('edit/{department}', [DepartmentController::class, 'update']);
    Route::get('delete/{department}', [DepartmentController::class, 'destroy']);
    Route::get('getDepartmentParents', [DepartmentController::class, 'getDepartmentParents']);
});
//Project Routes
Route::prefix('projects')->group(function (){
    Route::get('index', [ProjectController::class, 'index']);
    Route::get('create', [ProjectController::class, 'create']);
    Route::post('create', [ProjectController::class, 'store']);
    Route::get('edit/{project}', [ProjectController::class, 'edit']);
    Route::put('edit/{project}', [ProjectController::class, 'update']);
    Route::get('delete/{project}', [ProjectController::class, 'destroy']);
    Route::get('getPersons', [ProjectController::class, 'getPersons']);
});
//Task Route
Route::prefix('tasks')->group(function (){
    Route::get('index', [TaskController::class, 'index']);
    Route::get('create', [TaskController::class, 'create']);
    Route::post('create', [TaskController::class, 'store']);
    Route::get('edit/{task}', [TaskController::class, 'edit']);
    Route::put('edit/{task}', [TaskController::class, 'update']);
    Route::get('delete/{task}', [TaskController::class, 'destroy']);
    Route::get('getPersonByProject', [TaskController::class, 'getPersonByProject']);
    Route::get('getProject', [TaskController::class, 'getProject']);
    Route::get('filter', [TaskController::class, 'filter']);
    Route::get('search', [TaskController::class, 'search']);
    Route::get('exportExcel', [TaskController::class, 'exportExcel']);
});