<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CitaDecline extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Tu cita fue rechazada. AutoNavega";
    public $cita;
    public $agencia;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cita,$agencia)
    {
        $this->cita = $cita;
        $this->agencia = $agencia;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cita-decline');
    }
}
