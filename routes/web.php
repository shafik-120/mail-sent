<?php

use App\Http\Controllers\MailSendController;
use App\Http\Controllers\welcomeMailController;
use App\Mail\testMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('home');
})->name('home');

Route::get('/mail', [MailSendController::class, 'mailForm'])->name('mailForm');
Route::post('/sending-email', [MailSendController::class, 'sendingEmail'])->name('sendingEmail');

Route::get('/test', function(){
    for ($i=0; $i < 50; $i++) { 
        Mail::to("shafikul"  . $i. "@gmail.com")->send(new testMail());
    }
});

Route::get('/welcome', [welcomeMailController::class, 'welcome']);
Route::post('/sentMails', [welcomeMailController::class, 'welcomeMailSent'])->name('sendmails');