<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'chats_conversations';

    protected $fillable = ['titulo'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'chats_conversation_user');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function unreadMessagesFor($userId)
    {
        return $this->messages()->where('is_read', false)->where('user_id', '!=', $userId)->count();
    }

}
