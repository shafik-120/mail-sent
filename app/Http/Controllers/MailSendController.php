<?php

namespace App\Http\Controllers;

use App\Mail\SendingMail;
use App\Models\MailSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailSendController extends Controller
{
    public function mailForm (){
        return view('mailForm');
    }
    public function sendingEmail( Request $request){
        $request->validate([
            'mail_subject' => 'required',
            'mail_body' => 'required',
            'sent_mails' => 'required',
            'mail_files' => 'required',
        ]);
        
        $files = [];
        if($request->file('mail_files')){
            foreach ($request->file('mail_files') as $key => $file) {
                $fileName = time() . rand(). '.' . $file->extension();
                $file->move('uploads', $fileName);
                $files[]['name'] = $fileName;
            }
        }
        
        $userAllMail = explode(' ', $request->sent_mails);
        for ($i=0; $i < count($userAllMail); $i++) { 
            Mail::to($userAllMail[$i])->send(new SendingMail($request->all(), $files));
        }
    }
}
