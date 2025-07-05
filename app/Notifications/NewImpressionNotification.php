<?php

namespace App\Notifications;

use App\Models\Impression;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class NewImpressionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $impression;
    protected $creator;

    /**
     * Create a new notification instance.
     */
    public function __construct(Impression $impression)
    {
        $this->impression = $impression;
        $this->creator = $impression->user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        if ($notifiable->id === $this->creator->id) {
            return [];
        }
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'trip_id' => $this->impression->trip->id,
            'trip_title' => $this->impression->trip->title,
            'impression_id' => $this->impression->id,
            'impression_content_excerpt' => \Illuminate\Support\Str::limit($this->impression->content, 100),
            'creator_id' => $this->creator->id,
            'creator_name' => $this->creator->name,
            'message' => $this->creator->name . ' added an impression on your trip: ' . $this->impression->trip->title,
            'url' => route('admin.trips.show', $this->impression->trip->id) . '#impression-' . $this->impression->id,
        ];
    }
}
