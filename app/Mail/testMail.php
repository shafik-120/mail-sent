<?php

namespace App\Mail;

use App\Jobs\SendEmailJob;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class testMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $senderName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $senderName)
    {
        $this->data = $data;
        $this->senderName = $senderName;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->data['mail_subject'],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        // return new Content(
        //     view: 'mail.template',
        // );
        return new Content(
            view: 'mail.template',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        $fileData = explode(",", $this->data['mail_files']);
        $attachment = [];
        foreach ($fileData as $filePath) {
            $attachment[] = Attachment::fromStorageDisk('public', $filePath);
        }
        return $attachment;
    }
}
