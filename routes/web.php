<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;

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

Route::get('/', [TodoListController::class,'index'])->name('home');
// เพิ่มข้อมูล
Route::post('/todo/add', [TodoListController::class,'store'])->name('addTodo');
// เรียกดูแก้ไข
Route::get('/todo/edit/{id}', [TodoListController::class,'edit']);
// แก้ไข
Route::post('/todo/update/{id}', [TodoListController::class,'update']);
// update Status
Route::get('/todo/status/{id}', [TodoListController::class,'updateStatus']);
// deleted
Route::get('/todo/deleted/{id}', [TodoListController::class, 'deleted']);