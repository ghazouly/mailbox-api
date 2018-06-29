<?php

namespace App\Http\Controllers;

use App\Message;
use App\Repository\MailboxRepo;
use Illuminate\Http\Request;


class MessageController extends Controller
{

    public function __construct(MailboxRepo $mailbox_repo) {
        $this->mailbox_repo = $mailbox_repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = $this->mailbox_repo->getAllMessages($request->is_archived ?? 0);

        return response()->json([
            'message' => 'Messages Listed Successfully',
            'result'  => $messages
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = $this->mailbox_repo->getOneMessage($id);

        return response()->json([
            'message' => 'Message Listed Successfully',
            'result'  => $message
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $message = $this->mailbox_repo->readMessage($id);

        return response()->json([
            'message' => 'Message Read Successfully',
            'result'  => $message
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function archive($id)
    {
        $message = $this->mailbox_repo->archiveMessage($id);

        return response()->json([
            'message' => 'Message Archived Successfully',
            'result'  => $message
        ],200);
    }

}
