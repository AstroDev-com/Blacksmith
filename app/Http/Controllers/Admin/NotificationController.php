<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification; // Import DatabaseNotification
use Illuminate\Support\Facades\Log; // Import Log facade
use Illuminate\Support\Str;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // Fetch all notifications for the user, paginated
        $notifications = DatabaseNotification::where('notifiable_id', Auth::id())
            ->latest() // Show newest first
            ->paginate(20); // Adjust pagination as needed

        // Optional: Mark notifications on the current page as read automatically?
        // Auth::user()->unreadNotifications()->whereIn('id', $notifications->pluck('id'))->update(['read_at' => now()]);

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Mark a specific notification as read and redirect.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Notifications\DatabaseNotification $notification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead(Request $request, DatabaseNotification $notification)
    {
        // Ensure the notification belongs to the authenticated user
        if (Auth::id() !== $notification->notifiable_id) {
            Log::warning('Unauthorized attempt to mark notification as read.', ['user_id' => Auth::id(), 'notification_id' => $notification->id]);
            abort(403, 'Unauthorized action.');
        }

        // Mark the notification as read
        $notification->markAsRead();
        Log::info('Notification marked as read.', ['user_id' => Auth::id(), 'notification_id' => $notification->id]);

        // --- Debugging Redirect URL ---
        // Changed default fallback to the main dashboard route name
        $defaultRedirect = route('dashboard');
        $providedRedirectUrl = $request->query('redirect_url', $defaultRedirect);
        Log::debug('[Redirect URL Check] Provided URL:', ['url' => $providedRedirectUrl]);

        $redirectUrl = $providedRedirectUrl; // Start with the provided URL

        // === TEMPORARILY COMMENTED OUT VALIDATION FOR DEBUGGING ===
        /*
        $validationPassed = true; // Assume valid initially

        // Basic validation
        if (!filter_var($redirectUrl, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED)) { // Added FILTER_FLAG_PATH_REQUIRED
            Log::warning('[Redirect URL Check] Invalid URL format. Falling back to default.', ['url' => $redirectUrl]);
            $redirectUrl = $defaultRedirect;
            $validationPassed = false;
        } else {
            // More robust check: ensure the URL belongs to your application domain
            $appUrl = rtrim(config('app.url'), '/'); // Trim trailing slash from app URL
            $parsedAppUrl = parse_url($appUrl);
            $parsedRedirectUrl = parse_url($redirectUrl);
            $appHost = $parsedAppUrl['host'] ?? null;
            $redirectHost = $parsedRedirectUrl['host'] ?? null;

            // Check if hosts match OR if it's a relative URL starting with /
            if (!($appHost && $redirectHost && $appHost === $redirectHost) && !Str::startsWith($redirectUrl, '/')) {
                Log::warning('[Redirect URL Check] External or malformed URL. Falling back to default.', [
                    'redirect_url' => $redirectUrl,
                    'redirect_host' => $redirectHost,
                    'app_host' => $appHost
                ]);
                $redirectUrl = $defaultRedirect;
                $validationPassed = false;
            }
        }
        Log::info('[Redirect URL Check] Final Redirect URL after validation:', ['url' => $redirectUrl, 'validation_passed' => $validationPassed]);
        */
        // === END OF COMMENTED OUT VALIDATION ===

        Log::info('[Redirect URL Check] Attempting to redirect to:', ['url' => $redirectUrl]);
        // --- End Debugging ---

        return redirect($redirectUrl);
    }

    /**
     * Optional: Mark all unread notifications as read.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAllRead(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();
        Log::info('All notifications marked as read.', ['user_id' => Auth::id()]);

        return redirect()->back()->with('success', 'تم تحديد جميع الإشعارات كمقروءة');
    }

    /**
     * Remove the specified notification from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Notifications\DatabaseNotification $notification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, DatabaseNotification $notification)
    {
        // Ensure the notification belongs to the authenticated user
        if (Auth::id() !== $notification->notifiable_id) {
            Log::warning('Unauthorized attempt to delete notification.', ['user_id' => Auth::id(), 'notification_id' => $notification->id]);
            abort(403, 'Unauthorized action.');
        }

        $notification->delete();
        Log::info('Notification deleted.', ['user_id' => Auth::id(), 'notification_id' => $notification->id]);

        return redirect()->back()->with('success', 'تم حذف الإشعار بنجاح');
    }

    /**
     * Mark the specified notification as unread.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Notifications\DatabaseNotification $notification
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsUnread(Request $request, DatabaseNotification $notification)
    {
        // Ensure the notification belongs to the authenticated user
        if (Auth::id() !== $notification->notifiable_id) {
            Log::warning('Unauthorized attempt to mark notification as unread.', ['user_id' => Auth::id(), 'notification_id' => $notification->id]);
            abort(403, 'Unauthorized action.');
        }

        // Update read_at to null
        $notification->update(['read_at' => null]);
        Log::info('Notification marked as unread.', ['user_id' => Auth::id(), 'notification_id' => $notification->id]);

        return redirect()->back()->with('success', __('dashboard.notification_marked_unread'));
    }

    // Optional: Method to fetch notifications via AJAX (if you want dynamic updates)
    // public function fetchNotifications()
    // {
    //     $notifications = Auth::user()->unreadNotifications()->latest()->take(10)->get();
    //     $count = Auth::user()->unreadNotifications->count();
    //     return response()->json(['notifications' => $notifications, 'count' => $count]);
    // }
}
