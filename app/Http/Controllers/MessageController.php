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
     * @SWG\Get(
     *   path="/messages",
     *   summary="List All/Archived Messages",
     *   operationId="getAllMessages",
     *   @SWG\Parameter(
     *     name="is_archived",
     *     in="query",
     *     description="It's optional. But if you want list Archived Messages, just set 'is_archived' to equal 1",
     *     required=false,
     *     enum={0, 1},
     *     type="integer"
     *   ),
     *   security={
     *       {
     *           "default": {}
     *       }
     *   },
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *   @SWG\Response(response=401, description="not authorized")
     * )
     *
     */
    public function index(Request $request)
    {
        $messages = $this->mailbox_repo->getAllMessages($request->is_archived ?? 0);

        if(count($messages) > 0){

            return response()->json([
              'message' => 'Messages Listed Successfully',
              'result'  => $messages
            ],200);
        }

        return response()->json([
          'message' => 'No Messages Found',
          'result'  => ''
        ],406);

    }

    /**
     * @SWG\Get(
     *   path="/messages/{id}",
     *   summary="List Message",
     *   operationId="getOneMessage",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Select the Message you want to list by its Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   security={
     *       {
     *           "default": {}
     *       }
     *   },
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *   @SWG\Response(response=401, description="not authorized")
     * )
     *
     */
    public function show($id)
    {
        $message = $this->mailbox_repo->getOneMessage($id);

        if (!is_null($message)) {

            return response()->json([
              'message' => 'Message Listed Successfully',
              'result'  => $message
            ],200);
        }

        return response()->json([
          'message' => 'No Messages Found',
          'result'  => ''
        ],406);
    }

    /**
     * @SWG\Get(
     *   path="/messages/{id}/read",
     *   summary="Read Message",
     *   operationId="readMessage",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Select the Message you want to make it Read by its Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   security={
     *       {
     *           "default": {}
     *       }
     *   },
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *   @SWG\Response(response=401, description="not authorized")
     * )
     *
     */
    public function read($id)
    {
        $message = $this->mailbox_repo->readMessage($id);

        if (!is_null($message)) {

            return response()->json([
              'message' => 'Message Read Successfully',
              'result'  => $message
            ],200);
        }

        return response()->json([
          'message' => 'No Messages Found',
          'result'  => ''
        ],406);

    }

    /**
     * @SWG\Get(
     *   path="/messages/{id}/archive",
     *   summary="Archive Message",
     *   operationId="archiveMessage",
     *   @SWG\Parameter(
     *     name="id",
     *     in="path",
     *     description="Select the Message you want to make it Archived by its Id",
     *     required=true,
     *     type="integer"
     *   ),
     *   security={
     *       {
     *           "default": {}
     *       }
     *   },
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
     *   @SWG\Response(response=401, description="not authorized")
     * )
     *
     */
    public function archive($id)
    {
        $message = $this->mailbox_repo->archiveMessage($id);

        if (!is_null($message)) {

            return response()->json([
              'message' => 'Message Archived Successfully',
              'result'  => $message
            ],200);
        }

        return response()->json([
          'message' => 'No Messages Found',
          'result'  => ''
        ],406);
    }

}
