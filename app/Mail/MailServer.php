<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;

class MailServer extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Define the envelope (email subject, etc).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Want to Become Our Partner'
        );
    }

    /**
     * Define the email content (view and data).
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.template',
            with: ['data' => $this->data]
        );
    }

    /**
     * Define any attachments (empty here).
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
