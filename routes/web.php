<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckValues;


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


Route::get('/register', function () {
    return view("userRegister");
})->name("register");

Route::get('/register2', function () {
    return view("userRegister2");
})->name("register2");


Route::get('/', function () {
    return view("login");
})->name("login");


Route::middleware(['abass'])->group(function () {
    Route::get('/dashboard',[UserController::class, 'dashboard'])->name("dashboard");
    Route::get('/profiles',[UserController::class, 'profiles'])->name("profiles"); 
});


Route::post('/datas',[UserController::class, 'userRegister'])->name("datas");//->middleware("CheckSession");
Route::post('/datas2',[UserController::class, 'userRegister2'])->name("datas2");
Route::post('/login',[UserController::class, 'userLogin'])->name("loginUser");//->middleware("CheckSession");

Route::get('/logout', function (Request $request) {
    $request->session()->forget('email');
    return redirect('/');
})->name("register");