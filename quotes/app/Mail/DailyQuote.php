<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyQuote extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;
    public $author;

    public function __construct($quote, $author)
    {
        $this->quote = $quote;
        $this->author = $author;
    }

    public function build()
    {
        return $this->view('emails.daily-quote')
            ->subject('Your Daily Motivational Quote');
    }
}
