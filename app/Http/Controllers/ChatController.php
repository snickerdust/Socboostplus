<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseService;

class ChatController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebase = $firebaseService->getDatabase();
    }

    public function index() 
    {
        // For admin to view list of chats? 
        // Or maybe just load them in dashboard.
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string',
            'target_user_id' => 'nullable|string', // Only needed if admin sending to user
        ]);

        $sender = auth()->user();
        $isUser = $sender->role !== 'admin';

        // Thread ID is the User ID (One thread per user)
        $threadId = $isUser ? $sender->id : $validated['target_user_id'];

        if (!$threadId) {
            return back()->with('error', 'Target user missing');
        }

        $newMessage = [
            'sender_id' => $sender->id,
            'sender_name' => $sender->name,
            'role' => $sender->role,
            'message' => $validated['message'],
            'timestamp' => now()->timestamp,
            'created_at' => now()->toIso8601String() // Readable
        ];

        // Push to messages list
        $this->firebase->getReference("chats/{$threadId}/messages")->push($newMessage);
        
        // Update metadata for inbox listing
        $metaUpdate = [
            'last_message' => $validated['message'],
            'last_updated' => now()->timestamp,
            'unread_admin' => $isUser ? true : false,
            'unread_user' => !$isUser ? true : false,
        ];

        // Only set user_name if the user is sending, to avoid overwriting with "User"
        if ($isUser) {
            $metaUpdate['user_name'] = $sender->name;
            $metaUpdate['user_email'] = $sender->email; 
        }

        $this->firebase->getReference("chats/{$threadId}/meta")->update($metaUpdate);

        $this->firebase->getReference("chats/{$threadId}/meta")->update($metaUpdate);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Message sent',
                'data' => $newMessage
            ]);
        }

        return back()->with('success', 'Message sent');
    }
    public function fetchMessages()
    {
        $userId = auth()->id();
        $messages = $this->firebase->getReference("chats/{$userId}/messages")->getValue();
        
        // Mark as read for user
        $this->firebase->getReference("chats/{$userId}/meta")->update(['unread_user' => false]);
        
        return response()->json([
            'status' => 'success',
            'messages' => $messages ? array_values($messages) : []
        ]);
    }

    // Admin: Fetch all chat threads (metadata only ideal, but fetching all for now)
    public function fetchAdminChats()
    {
        $chats = $this->firebase->getReference("chats")->getValue();
        return response()->json([
            'status' => 'success',
            'chats' => $chats
        ]);
    }

    // Admin: Fetch specific conversation
    public function fetchConversation(Request $request)
    {
        $targetId = $request->query('user_id');
        if(!$targetId) return response()->json(['status'=>'error'], 400);

        $messages = $this->firebase->getReference("chats/{$targetId}/messages")->getValue();
        
        // Mark as read for admin
        $this->firebase->getReference("chats/{$targetId}/meta")->update(['unread_admin' => false]);

        return response()->json([
            'status' => 'success',
            'messages' => $messages ? array_values($messages) : []
        ]);
    }
}
