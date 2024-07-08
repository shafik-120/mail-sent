<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class welcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $allData;
    public $fileName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($allData, $fileName)
    {
        $this->allData = $allData;
        $this->fileName = $fileName;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->allData['mail_subject'],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emils.WelcomeMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    // public function attachments()
    // {
    //     $attachment = [];
    //     if ($this->fileName) {
    //         foreach ($this->fileName as $value) {
    //             $path = Attachment::fromPath(public_path('uploads/' .  $value['name']));
    //             $attachment[] = $path;
    //         }
    //     }
    //     return $attachment;
    // }
    public function attachments()
    {
        $attachment = [];
        if ($this->fileName) {
            foreach ($this->fileName as $filePath) {
                $attachment[] = Attachment::fromPath($filePath);
            }
        }
        return $attachment;
    }
}
