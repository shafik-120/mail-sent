<?php

namespace App\Mail;

use Log;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientSendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        $from_email = $this->data['from_email']; // email user sent pathate hobe
        $from_name = $this->data['from_name'] ?? 'Defult Name'; // Use default name if not provided
        $email = $this->from($from_email, $from_name)
                      ->subject($this->data['mail_subject'])
                      ->view('mail.template');

        foreach ($this->attachments() as $attachFile) {
            $email->attach($attachFile);
        }

        return $email;
    }

}
