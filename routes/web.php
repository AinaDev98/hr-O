<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployedController;
use App\Http\Controllers\PostController;
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

// Dashboard
Route::get('/administration', [AdminController::class, 'dashboard']);

// Login
Route::get('/', [EmployedController::class, 'formLogin']);

// Categories
Route::get('administration/category/create', [CategoryController::class, 'createCategory']);
Route::post('administration/category/add', [CategoryController::class, 'saveCategory']);
Route::get('administration/category/list', [CategoryController::class, 'showCategory']);
Route::post('administration/category/edit/save', [CategoryController::class, 'editSave']);
Route::get('administration/category/edit/{id}', [CategoryController::class, 'editCategory']);
Route::get('administration/category/delete/{id}', [CategoryController::class, 'deleteCategory']);

// Department
Route::get('administration/department/create', [DepartmentController::class, 'createDepartment']);
Route::post('administration/department/add', [DepartmentController::class,  'saveDepartment']);
Route::get('administration/department/list', [DepartmentController::class, 'showDepartment']);
Route::get('administration/department/edit/{id}', [DepartmentController::class, 'editDepartment']);
Route::post('administration/department/edit/save', [DepartmentController::class, 'editSave']);
Route::get('administration/department/delete/{id}', [DepartmentController::class, 'deleteDepartment']);

// Post function
Route::get('administration/function/create', [PostController::class, 'createPost']);
Route::post('administration/function/add', [PostController::class, 'savePost']);
Route::get('administration/function/list', [PostController::class, 'showPost']);
Route::get('administration/function/edit/{id}', [PostController::class, 'editPost']);
Route::post('administration/function/edit/save', [PostController::class, 'editSave']);
Route::get('administration/function/delete/{id}', [PostController::class, 'deletePost']);
Route::post('administration/function/delete/save', [PostController::class, 'deleteSave']);

// Employed
Route::get('administration/employed/create', [EmployedController::class, 'createEmployed']);
Route::post('administration/employed/register', [EmployedController::class, 'saveEmployed']);