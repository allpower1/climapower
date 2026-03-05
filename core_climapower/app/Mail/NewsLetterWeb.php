<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsLetterWeb extends Mailable
{
    use Queueable, SerializesModels;

    public $demo;

    /**
     * Crear una nueva instancia de mensaje.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Construye el mensaje.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newsletter_html')->subject('Newsletter desde la WEB ClimaPower.CL');
    }
}
