<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'messages';

    protected $fillable = [
        'user_id',
        'sender',
        'subject',
        'message',
        'is_read',
        'is_archived',
        'created_at'
    ];

    public function toArray()
    {
        return [
            'uid'         => $this->user_id,
            'sender'      => $this->sender,
            'subject'     => $this->subject,
            'message'     => $this->body,
            'is_read'     => $this->is_read,
            'is_archived' => $this->is_archived,
            'time_sent'   => $this->created_at,
        ];
    }

}
