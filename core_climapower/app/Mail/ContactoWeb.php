<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoWeb extends Mailable
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
        return $this->markdown('emails.contacto_html')->subject('Contacto desde la WEB ClimaPower.CL');
    }
}
