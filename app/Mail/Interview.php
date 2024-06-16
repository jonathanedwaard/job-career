<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class Interview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($candidateName)
    {
        $this->candidateName = $candidateName;
        $this->interviewDate = $this->calculateNextFriday8AM();
    }

    /**
     * Calculate the next Friday at 8 AM.
     *
     * @return string
     */
    protected function calculateNextFriday8AM()
    {
        $nextFriday = Carbon::now()->next(Carbon::FRIDAY)->setTime(8, 0, 0);
        return $nextFriday->toDateTimeString();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Interview Invitation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.interview',
            with: [
            'candidateName' => $this->candidateName,
            'interviewDate' => $this->interviewDate,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
