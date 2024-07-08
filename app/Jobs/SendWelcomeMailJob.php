<?php

namespace App\Jobs;

use App\Mail\welcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendWelcomeMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mailAddress;
    protected $requestData;
    protected $filePaths;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mailAddress, $requestData, $filePaths)
    {
        $this->mailAddress = $mailAddress;
        $this->requestData = $requestData; // This might not be used anymore
        $this->filePaths = $filePaths;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->mailAddress)->send(new welcomeMail($this->requestData, $this->filePaths));
    }
}
