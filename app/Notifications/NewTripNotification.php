<?php

namespace App\Notifications;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTripNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $trip;
    protected $creator; // The user who created the trip

    /**
     * Create a new notification instance.
     */
    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
        $this->creator = $trip->user; // Assuming trip model has user relationship
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // Only send via database
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     // ... (Mail implementation if needed later)
    // }

    /**
     * Get the array representation of the notification.
     * This is stored in the 'data' column of the notifications table.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'trip_id' => $this->trip->id,
            'trip_title' => $this->trip->title,
            'creator_id' => $this->creator->id,
            'creator_name' => $this->creator->name,
            'message' => __('notifications.new_trip_created', [
                'user' => $this->creator->name,
                'title' => $this->trip->title
            ], 'en'), // Provide a default locale if needed
            'url' => route('admin.trips.show', $this->trip->id), // Link to the new trip
            'icon' => 'fas fa-route text-warning' // Optional icon
        ];
    }
}
