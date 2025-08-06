<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
class OrderNotifcation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $order;
    public function __construct(Order $order)
    {
        //
        $this->order=$order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','broadcast'];
    }

    public function toBroadcast($notifiable)
{
    return new BroadcastMessage([
        'user_name' => $this->order->user_name,
       'order_id' => $this->order->id,
        'total_price' => $this->order->total_price,
    ]);
}
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
public function toDatabase($notifiable)
    {
        return [
            'user_name' => $this->order->user_name,
            'order_id' => $this->order->id,
            'total_price' =>  $this->order->total_price,
        ];
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
