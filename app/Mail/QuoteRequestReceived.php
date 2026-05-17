<?php

namespace App\Mail;

use App\Data\QuoteRequestData;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly QuoteRequestData $lead,
    ) {
    }

    public function build(): self
    {
        return $this
            ->subject('New Crestwell Facilities quote request')
            ->replyTo($this->lead->email, $this->lead->name)
            ->view('emails.quote-request-received');
    }
}
