<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('receiver_id', Auth::id())
            ->orWhere('sender_id', Auth::id())
            ->with(['sender', 'receiver'])
            ->latest()
            ->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('admin.messages.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'required|in:low,medium,high'
        ]);

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $validated['receiver_id'],
            'subject' => $validated['subject'],
            'content' => $validated['content'],
            'priority' => $validated['priority'],
            'status' => 'unread'
        ]);

        return redirect()->route('messages.index')
            ->with('success', 'تم إرسال الرسالة بنجاح');
    }

    public function show(Message $message)
    {
        if ($message->receiver_id === Auth::id()) {
            $message->update(['status' => 'read']);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function markAsRead(Message $message)
    {
        $message->update(['status' => 'read']);
        return back()->with('success', 'تم تحديث حالة الرسالة');
    }

    public function archive(Message $message)
    {
        $message->update(['status' => 'archived']);
        return back()->with('success', 'تم أرشفة الرسالة');
    }
}
