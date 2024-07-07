<?php

namespace App\Mail;

use Attribute;
use Illuminate\Bus\Queueable;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Mail\Attachable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Storage;

class SendingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $alldata;
    public $fileName;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alldata, $fileName)
    {
        $this->alldata = $alldata;
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
            subject: $this->alldata['mail_subject'],
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
        $attachment = [];
        if ($this->fileName) {
            foreach ($this->fileName as $value) {
                $path = Attachment::fromPath(public_path('uploads/' .  $value['name']));
                $attachment[] = $path;
                // $attachment[] = Attachment::fromStorage(public_path('uploads'), $value['name']);
                // $attachment[] = Attachment::fromStorageDisk('local', 'uploads/' .$value['name']);
                // $attachment[] = Attachment::fromStorageDisk('uploads', $value);
            }
        }
        return $attachment;
    }
}
