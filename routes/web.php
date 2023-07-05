<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;

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


/************************
 * RUTES GENERALS
 ************************/
Route::get('/', [SiteController::class, 'index'])->name('landing');
Route::get('/login', [SiteController::class, 'login'])->name('login');
Route::post('/signin', [SiteController::class, 'signin'])->name('signin');
Route::get('/logout', [SiteController::class, 'logout'])->name('logout');
Route::post('/signup', [SiteController::class, 'signup'])->name('signup');
Route::get('/register', [SiteController::class, 'register'])->name('register');
Route::get('/termesicondicions', [SiteController::class, 'termes'])->name('termes');
Route::get('/llistat-habitacions', [SiteController::class, 'roomsList'])->name('rooms-list');

/***************************
 * RUTES CONTACTE
 ***************************/
Route::get('/contacte', [ContactController::class, 'index'])->name('contact');
Route::post('/contacte/submit', [ContactController::class, 'submit'])->name('contact.submit');


/***************************
 * RUTES ROL ADMINISTRADOR
 ***************************/
Route::get('/admin', function () { return view('admin.index'); })->name('admin.index');

Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users');
Route::get('/admin/user/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/admin/user/store', [UsersController::class, 'store'])->name('users.store');
Route::get('/admin/user/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::post('/admin/user/update', [UsersController::class, 'update'])->name('users.update');
Route::get('/admin/user/{id}/delete', [UsersController::class, 'delete'])->name('users.delete');

Route::get('/admin/establishments', [EstablishmentController::class, 'index'])->name('admin.establishments');
Route::get('/admin/establishments/create', [EstablishmentController::class, 'create'])->name('establishment.create');
Route::post('/admin/establishment/store', [EstablishmentController::class, 'store'])->name('establishment.store');
Route::get('/admin/establishment/{id}', [EstablishmentController::class, 'edit'])->name('establishment.edit');
Route::post('/admin/establishment/update', [EstablishmentController::class, 'update'])->name('establishment.update');
Route::get('/admin/establishment/{id}/delete', [EstablishmentController::class, 'delete'])->name('establishment.delete');

Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms');
Route::get('/admin/room/create', [RoomController::class, 'create'])->name('room.create');
Route::post('/admin/room/store', [RoomController::class, 'store'])->name('room.store');
Route::get('/admin/room/{id?}', [RoomController::class, 'edit'])->name('room.edit');
Route::post('/admin/room/update', [RoomController::class, 'update'])->name('room.update');
Route::get('/admin/room/{id}/delete', [RoomController::class, 'delete'])->name('room.delete');

Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services');
Route::get('/admin/service/create', [ServiceController::class, 'create'])->name('service.create');
Route::get('/admin/service/{id?}', [ServiceController::class, 'edit'])->name('service.edit');
Route::post('/admin/service/store', [ServiceController::class, 'store'])->name('service.store');
Route::get('/admin/service/{id}/delete', [ServiceController::class, 'delete'])->name('service.delete');
Route::post('/admin/service/update', [ServiceController::class, 'update'])->name('service.update');


/***************************
 * RUTES ROL LLOGATER
 ***************************/
Route::get('/user', function () { return view('user.index'); })->name('user.index');
Route::get('/room/{id?}', [RoomController::class, 'show'])->name('room.show');
Route::get('/user/rooms', [RoomController::class, 'index'])->name('user.rooms');


/***************************
 * RUTES ROL CLIENT(TURISTA)
 ***************************/
Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/getDates/{id?}', [BookingController::class, 'getBookingsByRoom'])->name('booking.getDates');
Route::get('/booking/{id}/delete', [BookingController::class, 'destroy'])->name('booking.destroy');
