<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            $conversations = Conversation::with('users', 'messages', 'messages.user')->latest()->get();

            return view('admin.chat.index', compact('conversations'));
        } else {
            $cumpleseccionmasajista = 'NO';
            $cumpleseccionagencia = 'NO';
            $cumpleseccionpublicidad = 'NO';

            $conversations = $user->conversations()->with('messages.user')->latest()->get();

            return view('chatsuserclientes.listado', compact('conversations','cumpleseccionmasajista','cumpleseccionagencia','cumpleseccionpublicidad'));
        }
    }

    public function show($id)
    {
        $user = Auth::user();

        $conversation = Conversation::with('messages.user')->findOrFail($id);

        // Marcar mensajes como leídos
        $conversation->messages()->where('user_id', '!=', Auth::id())->update(['is_read' => true]);

        if ($user->is_admin) {
            return view('admin.chat.show', compact('conversation'));
        } else {
            $cumpleseccionmasajista = 'NO';
            $cumpleseccionagencia = 'NO';
            $cumpleseccionpublicidad = 'NO';

            return view('chatsuserclientes.detalle', compact('conversation','cumpleseccionmasajista','cumpleseccionagencia','cumpleseccionpublicidad'));
        }
    }

    public function sendMessage(Request $request, $conversationId)
    {
        $request->validate(['message' => 'required|string']);
        $conversation = Conversation::findOrFail($conversationId);

        Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->back();
    }

    public function startConversationForm()
    {
        $users = User::whereHas("roles", function($q){ $q->where("name", "Usuario General"); })->get();

        $user = Auth::user();

        if ($user->is_admin) {
            return view('admin.chat.new', compact('users'));
        } else {
            $cumpleseccionmasajista = 'NO';
            $cumpleseccionagencia = 'NO';
            $cumpleseccionpublicidad = 'NO';

            return view('chatsuserclientes.nuevaconversacion', compact('users','cumpleseccionmasajista','cumpleseccionagencia','cumpleseccionpublicidad'));
        }
    }

    public function startConversation(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $conversation = Conversation::create(['titulo' => $request->titulo ?? 'Nueva conversación']);
        $conversation->users()->attach([Auth::id(), $request->user_id]);

        return redirect()->route('chat.show', $conversation->id);
    }

}
