<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SolicitudAgencyNoti extends Notification
{
    use Queueable;
    protected $solicitud_agencia;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($solicitud_agencia)
    {
        $this->solicitud_agencia = $solicitud_agencia;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'text' => "Hay una nueva solicitud de agencia para: ".$this->solicitud_agencia->razon_social,
            "data" => $this->solicitud_agencia->toArray()
        ];
    }
}
