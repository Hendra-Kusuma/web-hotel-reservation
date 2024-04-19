<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\testController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//auth
// untuk route /admin untuk register pihak admin, 
// untuk register user ada di route /user
Route::get('/admin', [AuthController::class, 'registerPage'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//

Route::get('/home', function(){
    return view('home');
})->middleware('auth');


// Hotel
Route::get('/hotel', [HotelController::class, 'index'])->name('hotel')->middleware('auth');
Route::get('/hotel/create', [HotelController::class, 'createHotel'])->middleware('auth');
Route::post('/hotel/create', [HotelController::class, 'store']);
Route::get('/hotel/edit/{id}', [HotelController::class, 'edit']);
Route::put('/hotel/edit/{id}', [HotelController::class, 'update']);
Route::delete('/hotel/delete/{id}', [HotelController::class, 'destroy']);


// Rooms
Route::get('/room/{id}', [RoomController::class, 'index'])->name('room')->middleware('auth');    
Route::get('/room/create/{id}', [RoomController::class, 'create'])->middleware('auth');
Route::post('/room/create', [RoomController::class, 'store'])->middleware('auth');   
Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->middleware('auth');   
Route::put('/room/edit/{id}', [RoomController::class, 'update'])->middleware('auth');  
Route::delete('/room/delete/{id}', [RoomController::class, 'destroy'])->middleware('auth');  

// Users

Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth'); 
Route::get('/user/create', [UserController::class, 'create'])->middleware('auth'); 
Route::post('/user/create', [UserController::class, 'store'])->middleware('auth'); 
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth'); 
Route::put('/user/edit/{id}', [UserController::class, 'update'])->middleware('auth'); 
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->middleware('auth'); 


//Reservation