<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
use Lang;

class MailResetPasswordNotification extends ResetPassword
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        parent::__construct($token);
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
//        $link = url( "/reset-password/".$this->token );
        $link = env('FRONT_URL').'reset-password/'.$this->token;
        return (new MailMessage)
            ->subject(Lang::get('mail.reset_password_not'))
            ->line(Lang::get('mail.reset_password_not_desc'))
            ->action(Lang::get('mail.reset_password'), $link )
            ->line(Lang::get('mail.thank_for_using'))
            ->line( Lang::get('mail.password_reset_expire').config('auth.passwords.users.expire').Lang::get('mail.minutes') )
            ->line( Lang::get('mail.did_not_request') );
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
