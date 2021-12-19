<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentControllers;
use App\Http\Controllers\SessionControllers;
use App\Http\Controllers\BookingControllers;

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


Route::resource('student',StudentControllers::class);
Route::resource('session',SessionControllers::class);
Route::resource('booking',BookingControllers::class);
