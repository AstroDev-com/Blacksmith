<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conversation extends Model
{
    use HasFactory;

    // No fillable fields needed for now, usually created indirectly
    protected $guarded = [];

    /**
     * Get the messages for the conversation.
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * The participants that belong to the conversation.
     */
    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'conversation_participants')
            ->withTimestamps()
            ->withPivot('read_at'); // Include read_at from pivot
    }

    /**
     * Get the participant records for the conversation.
     */
    public function conversationParticipants(): HasMany
    {
        return $this->hasMany(ConversationParticipant::class);
    }

    /**
     * Get the latest message for the conversation.
     */
    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }
}
