<?php

namespace App\Notifications;

use App\Models\Trip;
use App\Models\TripTransaction;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewTransactionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $transaction;
    protected $trip;
    // We don't necessarily need the creator here unless we want to mention who added it

    /**
     * Create a new notification instance.
     */
    public function __construct(TripTransaction $transaction)
    {
        $this->transaction = $transaction;
        $this->trip = $transaction->trip; // Get the related trip
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // Don't notify the user who added the transaction if they also own the trip
        // Or simply: always notify the trip owner unless they added it themselves (check in controller)
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //    // ...
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $amountFormatted = number_format($this->transaction->amount, 2);
        $currency = $this->transaction->currency;
        $transactionType = __('dashboard.' . $this->transaction->type, [], 'en'); // Get localized type

        return [
            'trip_id' => $this->trip->id,
            'trip_title' => $this->trip->title,
            'transaction_id' => $this->transaction->id,
            'transaction_type' => $this->transaction->type,
            'transaction_amount' => $this->transaction->amount,
            'transaction_currency' => $currency,
            'message' => __('notifications.new_transaction_added', [
                'type' => $transactionType,
                'amount' => $amountFormatted,
                'currency' => $currency,
                'trip' => $this->trip->title
            ], 'en'),
            'url' => route('admin.trips.show', $this->trip->id) . '#transactions-tab', // Link to the trip's transactions tab
            'icon' => $this->transaction->type === 'income' ? 'fas fa-plus-circle text-success' : 'fas fa-minus-circle text-danger' // Optional icon based on type
        ];
    }
}
