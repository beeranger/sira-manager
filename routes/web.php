<?php

use App\Models\Title;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YearController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActivateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ClassroomController;

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

Route::get('/administration', function () {
    return view('administration',[
        "title" => "Administration"
    ]);
})->middleware('auth');

Route::get('/',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/activate',[ActivateController::class,'index'])->middleware('guest');
Route::post('/activate',[ActivateController::class,'store']);

Route::get('dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/properties/titles/checkSlug',[TitleController::class,'checkSlug'])->middleware('auth');

Route::resource('/dashboard/properties/titles',TitleController::class)->middleware('auth');
Route::resource('/dashboard/employees',EmployeeController::class)->middleware('auth');
Route::resource('/dashboard/students',StudentController::class)->middleware('auth');
Route::resource('/dashboard/properties/years',YearController::class)->middleware('auth');
Route::resource('/dashboard/properties/classrooms',ClassroomController::class)->middleware('auth');
