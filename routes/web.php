<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContentsController;

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
    return view('welcome');
});

// done
Route::get('/auth/logout', [AuthController::class, 'logout'])->middleware('auth');
// done
Route::get('/auth/login', [AuthController::class, 'loginForm'])->middleware('guest');
// done
Route::post('/auth/login', [AuthController::class, 'login'])->middleware('guest');
// done
Route::get('/auth/dashboard', [AuthController::class, 'dashboard'])->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list']);
Route::get('/console/users/add', [UsersController::class, 'addForm']);
Route::post('/console/users/add', [UsersController::class, 'add']);
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+');


// done
Route::get('/console/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
// done
Route::get('/console/projects/add', [ProjectsController::class, 'addForm'])->middleware('auth');
// done
Route::post('/console/projects/add', [ProjectsController::class, 'add'])->middleware('auth');
// done
Route::get('/console/projects/edit/{project:id}', [ProjectsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
// done
Route::post('/console/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
// done
Route::get('/console/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
// done
Route::get('/console/projects/image/{project:id}', [ProjectsController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
// done
Route::post('/console/projects/image/{project:id}', [ProjectsController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');



Route::get('/console/textcontents/list', [ContentsController::class, 'list'])->middleware('auth');
Route::get('/console/textcontents/add', [ContentsController::class, 'addForm'])->middleware('auth');
Route::post('/console/textcontents/add', [ContentsController::class, 'add'])->middleware('auth');
Route::get('/console/textcontents/edit/{content:id}', [ContentsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/textcontents/edit/{content:id}', [ContentsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/textcontents/delete/{content:id}', [ContentsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');