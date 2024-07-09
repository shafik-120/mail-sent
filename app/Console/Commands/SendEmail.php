<?php

namespace App\Console\Commands;

use App\Mail\ClientSendEmail;
use App\Models\ClientMail;
use App\Models\Sender_mail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = ClientMail::first();
        $mail = $data->mail;
        $mail_subject = $data->mail_subject;
        $mail_body = $data->mail_body;
        $mail_files = $data->mail_files;

        $mail_arr = [
            'mail' => $mail,
            'mail_subject' => $mail_subject,
            'mail_body' => $mail_body,
            'mail_files' => $mail_files,
        ];

        $senderEmails = Sender_mail::all();
        foreach ($senderEmails as $senderMail) {
            $mail_arr['from_email'] = $senderMail->mail;
            if (Mail::to($data->mail)->send(new ClientSendEmail($mail_arr))) {
                echo "successful";
            } else {
                echo "unsuccessful ";
            }
        }
    }
}
