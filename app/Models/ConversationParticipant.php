<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConversationParticipant extends Pivot
{
    // Specify the table name if it doesn't follow convention (it does here)
    protected $table = 'conversation_participants';

    // Enable timestamps for the pivot table
    public $timestamps = true;

    protected $fillable = [
        'conversation_id',
        'user_id',
        'read_at',
    ];

    /**
     * Get the conversation associated with the participant record.
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    /**
     * Get the user associated with the participant record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
