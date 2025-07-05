<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ConversationController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        /** @var \App\Models\User $user */
        $conversations = $user->conversations()
            ->with(['latestMessage.user', 'participants'])
            ->withCount(['messages as unread_count' => function ($query) use ($user) {
                $query->where('user_id', '!=', $user->id)
                    ->where(function ($q) use ($user) {
                        $q->whereNull('conversation_participants.read_at')
                            ->orWhereColumn('messages.created_at', '>', 'conversation_participants.read_at');
                    });
            }])
            ->orderBy('updated_at', 'desc')
            ->paginate(15);

        return view('admin.conversations.index', compact('conversations'));
    }

    public function create(): View
    {
        $currentUser = Auth::user();
        $users = \App\Models\User::where('id', '!=', $currentUser->id)->orderBy('name')->get();

        return view('admin.conversations.create', compact('users'));
    }

    public function show(Conversation $conversation): View
    {
        $user = Auth::user();

        // Eager load participants to prevent lazy loading errors
        $conversation->load('participants');

        // 1. Verify user is a participant
        if (!$conversation->participants->contains($user)) {
            abort(403, 'Unauthorized action.');
        }

        $messages = $conversation->messages()
            ->with('user') // Eager load the sender
            ->orderBy('created_at', 'asc')
            ->get(); // Or paginate()

        $conversation->conversationParticipants()
            ->where('user_id', $user->id)
            ->update(['read_at' => now()]);

        return view('admin.conversations.show', compact('conversation', 'messages'));
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();

        // Check if it's a request to start a NEW conversation
        if ($request->has('recipients') && $request->filled('recipients')) {

            $validated = $request->validate([
                'recipients' => 'required|array|min:1',
                'recipients.*' => 'required|integer|exists:users,id',
                'message' => 'required|string|max:5000',
            ]);

            $recipients = $validated['recipients'];
            $allParticipantsIds = array_merge($recipients, [$user->id]);
            sort($allParticipantsIds); // Sort IDs to ensure consistent checking

            // --- Check if a conversation with these exact participants already exists ---
            $existingConversation = Conversation::whereHas('participants', function ($query) use ($allParticipantsIds) {
                $query->whereIn('user_id', $allParticipantsIds);
            }, '=', count($allParticipantsIds))
                ->whereHas('participants', function ($query) use ($allParticipantsIds) {
                    $query->whereIn('user_id', $allParticipantsIds);
                })
                ->first();
            // ->whereDoesntHave('participants', function ($query) use ($allParticipantsIds) {
            // $query->whereNotIn('user_id', $allParticipantsIds);
            // })->first(); // More robust check?

            if ($existingConversation) {
                // Conversation already exists, just add the message to it
                $conversation = $existingConversation;
            } else {
                // Create new conversation
                $conversation = Conversation::create();
                // Attach participants
                $conversation->participants()->attach($allParticipantsIds);
            }

            // Create the message
            $message = $conversation->messages()->create([
                'user_id' => $user->id,
                'body' => $validated['message'],
            ]);

            // Update conversation timestamp
            $conversation->touch();

            // Mark as read for the sender
            $conversation->conversationParticipants()
                ->where('user_id', $user->id)
                ->update(['read_at' => now()]);

            return redirect()->route('conversations.show', $conversation->id)
                ->with('success', __('dashboard.message_sent_successfully'));
        } elseif ($request->has('conversation_id')) {
            $validated = $request->validate([
                'conversation_id' => 'required|integer|exists:conversations,id',
                'message' => 'required|string|max:5000',
            ]);

            // Find the conversation and load participants
            $conversation = Conversation::with('participants')->findOrFail($validated['conversation_id']);

            if (!$conversation->participants->contains($user)) {
                return redirect()->route('conversations.index')->with('error', __('dashboard.not_participant'));
            }

            $message = $conversation->messages()->create([
                'user_id' => $user->id,
                'body' => $validated['message'],
            ]);

            $conversation->touch();

            $conversation->conversationParticipants()
                ->where('user_id', $user->id)
                ->update(['read_at' => now()]);

            return redirect()->route('conversations.show', $conversation->id)
                ->with('success', __('dashboard.message_sent_successfully'));
        } else {
            // Invalid request
            return redirect()->back()->with('error', __('dashboard.invalid_request'))->withInput();
        }
    }

    public function destroy(Conversation $conversation): RedirectResponse
    {
        $user = Auth::user();

        // Eager load participants
        $conversation->load('participants');

        if (!$conversation->participants->contains($user)) {
            return redirect()->route('conversations.index')->with('error', __('dashboard.not_participant'));
        }

        $conversation->participants()->detach($user->id);

        return redirect()->route('conversations.index')
            ->with('success', __('dashboard.conversation_left_successfully'));
    }
}
