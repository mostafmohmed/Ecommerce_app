<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class contactnotifction extends Notification
{
    use Queueable;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'name'    => $this->contact->name,
            'email'   => $this->contact->email,
            'message' =>'iiiiiiiiiiiii',
        ];
    }

public function broadcastType(): string
{
    return 'notification';
}


    public function toBroadcast($notifiable)
    {
        \Log::info('📢 Broadcasting notification to user ID: ' . $notifiable->id);

        return new BroadcastMessage([
            'name'    => $this->contact->name,
            'email'   => $this->contact->email,
            'message' => $this->contact->message,
        ]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'name'    => $this->contact->name,
            'email'   => $this->contact->email,
            'message' => $this->contact->massage,
        ];
    }
}
