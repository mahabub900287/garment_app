<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use App\Events\ChatMessageSent;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = new ChatMessage(); // Create a new message object
        $message->user_id = $user->id;
        $message->message = $request->input('message');
        $message->save();

        broadcast(new ChatMessageSent($message, $user))->toOthers();

        return response()->json(['status' => 'Message sent']);
    }
}
