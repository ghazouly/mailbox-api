<?php

namespace App\Repository;

use App\Models\Message;


Class MailboxRepo extends AbstractRepo
{
    public function getAllMessages($is_archived=0)
    {

        $messages = Message::where('is_archived', $is_archived)
                            ->latest()
                            ->paginate(5);

        return $messages;
    }

    public function getOneMessage($id)
    {

        $message = Message::find($id);
        return $message;
    }

    public function readMessage($id)
    {

        $message = Message::find($id);

        if ($message->is_read == 0) {
            $message->update([
                'is_read' => 1
              ]);
            $message->refresh();
        }

        return $message;
    }

    public function archiveMessage($id)
    {

        $message = Message::find($id);

        if ($message->is_archived) {
            $message->update([
                'is_archived' => 1
              ]);
            $message->refresh();
        }

        return $message;
    }

}
