<?php

use App\Http\Controllers\StudentController;
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

Route::get('/',[StudentController::class, 'index']);
Route::get('/add',[StudentController::class, 'add']);
Route::get('/edit',[StudentController::class, 'edit']);
Route::post('/student/store',[StudentController::class, 'store']);
Route::get('/student/{id}/edit',[StudentController::class, 'edit']);
Route::put('/student/{id}/update',[StudentController::class, 'update']);
Route::put('/updatestatus/{id}',[StudentController::class, 'updateStatus'])->name('updatestatus');
Route::get('/student/{id}/delete',[StudentController::class, 'delete']);
