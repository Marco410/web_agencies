<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudAprobar extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Cambio el estado de tu solicitud.";
    public $solicitud;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solicitud,$user)
    {
        $this->solicitud = $solicitud;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.solicitud-aprobar');
    }
}
