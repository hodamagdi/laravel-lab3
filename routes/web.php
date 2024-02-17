<?php
use App\Http\controllers\userscontroller;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/posts',[PostController::class,'index']);
Route::get('/posts/create',[PostController::class,'create']);
Route::get('/posts/{id}',[PostController::class,'show']);
Route::post('/posts',[PostController::class,'store']);
Route::get('/posts/{id}/edit',[PostController::class,'edit']);
Route::put('/posts/{id}',[PostController::class,'update']);
Route::delete('/posts/{id}',[PostController::class,'delete']);


Route::get('/users',[userscontroller::class , 'index']);
Route::get('/users/create', [userscontroller::class,'create']);
Route::get('/users/{user}', [userscontroller::class,'show'])->name('users.show');
Route::post('/users', [userscontroller::class,'store']);
Route::get('/users/{id}/edit', [userscontroller::class,'edit']);
Route::put('/users/{id}', [userscontroller::class,'update']);
Route::delete('/users/{user}', [userscontroller::class,'delete']);

Route::fallback(function () {
    return ('this page not found');
});




