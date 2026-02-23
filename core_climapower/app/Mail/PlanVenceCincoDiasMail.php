<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\UsersPlanes;

class PlanVenceCincoDiasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $plan;

    public function __construct(UsersPlanes $plan)
    {
        $this->plan = $plan;
    }

    public function build()
    {
        return $this->markdown('emails.planes.vencecincodias_html')->subject('Tu plan TuMasajistaVIP vence en 5 días');
    }

}
