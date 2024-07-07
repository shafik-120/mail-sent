<?php

use App\Http\Controllers\MailSendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('home');
})->name('home');

Route::get('/mail', [MailSendController::class, 'mailForm'])->name('mailForm');
Route::post('/sending-email', [MailSendController::class, 'sendingEmail'])->name('sendingEmail');