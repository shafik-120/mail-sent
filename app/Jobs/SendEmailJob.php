<?php

namespace App\Jobs;

use App\Mail\testMail;
use App\Models\ClientMail;
use App\Models\Mailsetting;
use App\Models\Mail_message;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Config;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $senderData;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($senderData)
    {
        $this->senderData = $senderData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        foreach ($this->senderData as $mailSetting) {
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

            $senderData = ClientMail::first();
            try {
                Mail::to($senderData->mail)->send(new testMail($senderData));
                $mailStatus = true;
            } catch (\Throwable $th) {
                // echo $th->getMessage();
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

            echo "success-- ";
        }
    }
}
