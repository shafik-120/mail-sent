<?php

namespace App\Http\Controllers;

use App\Mail\welcomeMail;
use Illuminate\Http\Request;
use App\Jobs\SendWelcomeMailJob;
use Illuminate\Support\Facades\Mail;

class welcomeMailController extends Controller
{
    public function welcomeMailSent(Request $request){
        $request->validate([
            'mail_subject' => 'required',
            'mail_body' => 'required',
            'sent_mails' => 'required',
        ]);

        $fileNames = [];
        if($request->file('mail_files')){
            foreach ($request->file('mail_files') as $key => $file) {
                $fileName = time() . rand(). '.' . $file->extension();
                $file->move('uploads', $fileName);
                $fileNames[]['name'] = $fileName;
            }
        }

        $sent_mails = $request->sent_mails;
        $mailCount = explode(" ", $sent_mails);

        foreach ($mailCount as $mailAddress) {
            $filePaths = [];
            if ($fileNames) {
              foreach ($fileNames as $fileName) {
                $filePaths[] = public_path('uploads/' . $fileName['name']);
              }
            }
            SendWelcomeMailJob::dispatch($mailAddress, [
              'mail_subject' => $request->mail_subject,
              'mail_body' => $request->mail_body,
            ], $filePaths);
          }
          
    }
    public function welcome(){
        return view('mailForm');
    }
}
