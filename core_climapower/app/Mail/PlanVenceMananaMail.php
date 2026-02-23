<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\UsersPlanes;

class PlanVenceMananaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $plan;

    public function __construct(UsersPlanes $plan)
    {
        $this->plan = $plan;
    }

    public function build()
    {
        return $this->markdown('emails.planes.vencemanana_html')->subject('Tu plan TuMasajistaVIP vence mañana');
    }

}
