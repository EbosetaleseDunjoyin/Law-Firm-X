<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeClientNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $first_name;
    public function __construct($first_name)
    {
        //
        $this->first_name = $first_name;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("Welcome to Firm X")
                    ->greeting("Hello {$this->first_name},")
                    ->line('This is the Law Firm X, we help you win.')
                    ->action('Website', url('/'))
                    ->line('Thank you for using our Law Firm X!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
