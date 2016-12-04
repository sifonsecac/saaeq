<?php

namespace App\Notifications\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Setting;

class ActivationAccountNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        return (new MailMessage)
                    ->from( 'no-reply@saaeq.com', env('APP_NAME') )
                    ->success()
                    ->subject('Activa Tu Cuenta '. env('APP_NAME'))
                    ->greeting( 'Nos da gusto que estés aquí, '.explode(' ', trim($notifiable->name) )[0] )
                    ->line( 'Activa tu cuenta.' )
                    ->action( 'Activar mi cuenta', $notifiable->getMailActivationAcountUrl() )
                    ->line( '(Solo para confirmar sí tu eres tú)');
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
