<?php

namespace App\Console\Commands;

use App\Http\Controllers\testController;
use Illuminate\Console\Command;

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

        $sentMailCall = new testController();
        $result = $sentMailCall->sentEmail();
        $this->info($result);
        return 0;
    }
}

        // $data = ClientMail::first();
        // $mail = $data->mail;
        // $mail_subject = $data->mail_subject;
        // $mail_body = $data->mail_body;
        // $mail_files = $data->mail_files;

        // $mail_arr = [
        //     'mail' => $mail,
        //     'mail_subject' => $mail_subject,
        //     'mail_body' => $mail_body,
        //     'mail_files' => $mail_files,
        // ];

        // function deletANDcreate($getMails)
        // {
        //     Mail_message::create([
        //         'mail' => $getMails,
        //         'msg' => 'Mail Sent successful'
        //     ]);

        //     Mail_message::where('mail', $getMails)->delete();

        //     return true;
        // }

        // $senderEmails = Sender_mail::all();
        // foreach ($senderEmails as $senderMail) {
        //     $mail_arr['from_email'] = $senderMail->mail;
        //     try {
        //         Mail::to($data->mail)->send(new ClientSendEmail($mail_arr));
        //         if(deletANDcreate($data->mail)){
        //             echo "mail delete create successful";
        //         } else{
        //             echo "mail delete create Unsuccessful";
        //         }
        //     } catch (\Throwable $th) {
        //         echo "unsuccessful: " . $th->getMessage();
        //     }
        // }
 