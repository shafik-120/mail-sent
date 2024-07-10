<?php

namespace App\Http\Controllers;

use Config;
use App\Mail\testMail;
use App\Models\ClientMail;
use App\Models\Mail_message;
use App\Models\Mailsetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class testController extends Controller
{
    public function sentEmail()
    {
        // Get all mail settings
        $mailSettings = Mailsetting::all();


        // Iterate over each mail setting
        foreach ($mailSettings as $mailSetting) {
            // Configure the mail settings
            $data = [
                'driver' => $mailSetting->mail_transport,
                'host' => $mailSetting->mail_host,
                'port' => $mailSetting->mail_port,
                'encryption' => $mailSetting->mail_encryption,
                'username' => $mailSetting->mail_username,
                'password' => $mailSetting->mail_password,
                'from' => [
                    'address' => $mailSetting->mail_from,
                    'name' => $mailSetting->mail_sender_name,
                ],
            ];
            Config::set('mail', $data);
            Mail::purge();
            // Send an email to the client using the current mail setting

            $senderData = ClientMail::first();
            try {
                Mail::to($senderData->mail)->send(new testMail($senderData));
                $mailStatus = true;
            } catch (\Throwable $th) {
                echo $th->getMessage();
                Log::error('Failed to send email with settings: ' . json_encode($mailSetting) . ', Error: ' . $th->getMessage());
                $mailStatus = false;
            }
            $mailMessage = Mail_message::create([
                'sender_mail' => $mailSetting->mail_username,
                'reciver_mail' => $senderData->mail,
                'mail_status' => $mailStatus,
                'msg' => ($mailStatus) ? 'Mail sent Succesful' : 'Mail sent failed'
            ]);

            $senderMailDelete = $senderData->delete();
            echo $mailSetting->mail_username . ', ==' ;
            echo $mailStatus . ' <br>';


        }
    }


    // public function sentEmail()
    // {
    //     $mailSetting = Mailsetting::all();
    //     foreach ($mailSetting as $key => $value) {
    //         $data = [
    //             'driver' => $value->mail_transport,
    //             'host' => $value->mail_host,
    //             'port' => $value->mail_port,
    //             'encryption' => $value->mail_encryption,
    //             'username' => $value->mail_username,
    //             'password' => $value->mail_password,
    //             'from' => [
    //                 'address' => $value->mail_from,
    //                 'name' => $value->mail_sender_name,
    //             ],
    //         ];
    //         Config::set('mail', $data);


    //         $senderData = ClientMail::first();
    //         Mail::to($senderData->mail)->send(new testMail($senderData));
    //     }
    // }
}
