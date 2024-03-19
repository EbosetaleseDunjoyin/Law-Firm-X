<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PassportReminderClientNotification extends Notification
{
    use Queueable;

    protected $first_name;
    /**
     * Create a new notification instance.
     */
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
                    ->subject("Reminder For Passport")
                    ->greeting("Hello {$this->first_name},")
                    ->line('Please do well to submit passport image at Law Firm X')
                    ->line("")
                    ->line('Best Regards,')
                    ->line('Law Firm X');
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
