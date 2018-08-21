<?php

namespace App\Notifications;

use App\Genero;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GeneroNotification extends Notification
{
    use Queueable;

    public $nombre, $fecha;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Genero $genero)
    {
        $this->nombre = $genero->nombre;
        $this->fecha = $genero->deleted_at;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->greeting('Saludos!')
            ->subject('Género enviado a papelera')
            ->line("Se envió a papelera el género " . $this->nombre . "a las " . $this->fecha);
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
            //
        ];
    }
}
