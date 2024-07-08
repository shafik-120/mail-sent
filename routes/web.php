<?php

use App\Http\Controllers\ClientMailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('home');
})->name('home');

Route::resource('mail', ClientMailController::class);