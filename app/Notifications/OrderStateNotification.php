<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStateNotification extends Notification
{
    use Queueable;
    private $user_id;
    private $order_id;
    private $message;
    public function __construct($user_id,$order_id,$message)
    {
        $this->user_id = $user_id;
        $this->order_id = $order_id;
        $this->message = $message;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'user_id' => $this->user_id,
            'order_id' => $this->order_id,
            'message' => $this->message,
        ];
    }
}
