<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Log; // Import Log facade
use Mcamara\LaravelLocalization\Facades\LaravelLocalization; // Import LaravelLocalization

class HeaderComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        Log::info('HeaderComposer compose method started (Full Logic).');

        $user = Auth::user();
        $unreadNotificationsCount = 0;
        $unreadConversationsCount = 0; // Initialize to 0
        $unreadNotifications = collect();
        $isRTL = LaravelLocalization::getCurrentLocale() == 'ar';

        if ($user) {
            Log::info('HeaderComposer: User authenticated.', ['user_id' => $user->id]);
            // Calculate notifications normally
            $unreadNotifications = $user->unreadNotifications;
            $unreadNotificationsCount = $unreadNotifications->count();

            // --- Calculate Unread Conversations Count (Re-enabled) ---
            try {
                $unreadConversationsCount = $user->conversations()
                    ->where(function ($query) {
                        $query->whereNull('conversation_participants.read_at')
                            ->orWhereColumn('conversations.updated_at', '>', 'conversation_participants.read_at');
                    })
                    ->count();
                Log::info('HeaderComposer: Unread conversations calculated.', ['count' => $unreadConversationsCount]);
            } catch (\Exception $e) {
                Log::error('HeaderComposer: Error calculating unread conversations.', ['error' => $e->getMessage()]);
                $unreadConversationsCount = 0; // Default to 0 on error
            }
        } else {
            Log::warning('HeaderComposer: User not authenticated when composing header.');
        }

        $view->with('unreadNotificationsCount', $unreadNotificationsCount)
            ->with('unreadNotifications', $unreadNotifications)
            ->with('unreadConversationsCount', $unreadConversationsCount)
            ->with('isRTL', $isRTL);

        Log::info('HeaderComposer compose method finished (Full Logic).', ['unreadNotif' => $unreadNotificationsCount, 'unreadConvo' => $unreadConversationsCount]);
    }
}
