<?php

use App\Http\Controllers\ClientMailController;
use App\Http\Controllers\MailsettingController;
use App\Http\Controllers\testController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('home');
})->name('home');

Route::resource('mail', ClientMailController::class);
Route::resource('mailsetting', MailsettingController::class);

// Route::get('/sent', [testController::class, 'sentEmail'])->name('sent');
Route::get('/template', function(){
   return  view('mailtemplate');
});