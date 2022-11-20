<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'status'        => 'success',
            'status_code'   => 200,
            'chats'         => ChatResource::collection(Chat::all()),
        ];
        return response()->json($data,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator              = Validator::make($request->all(), [
            'consultation_id'   => 'required|numeric',
            'id_sender'         => 'required|numeric',
            'id_receiver'       => 'required|numeric',
            'message_text'      => 'required',
        ]);
        $data_chat              = $request->all();
        $data_chat['id']        = time().random_int(10000,99999).random_int(10000,80000);
        if ($validator->fails()){
            return response()->json([
                "error"     => $validator->errors(),
                "created"   => time(),
                "chat"      => $data_chat
            ],203);
        }
        $chat   = new Chat();
        $add    = $chat->create($data_chat);
        return response()->json([
            "error" => $validator->errors(),
            "created"   => time(),
            "chat"  => $data_chat
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        $data_chat = ChatResource::make($chat);
        return response()->json([
            "message" => "success",
            "chat"  => $chat
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        $validator              = Validator::make($request->all(), [
            'consultation_id'   => 'required|numeric',
            'id_sender'         => 'required|numeric',
            'id_receiver'       => 'required|numeric',
            'message_text'      => 'required',
        ]);
        $data_chat              = $request->all();
        $data_chat['read_at']   = time();
        if ($validator->fails()){
            return response()->json([
                "error"     => $validator->errors(),
                "chat"      => $chat
            ],203);
        }

        $chat->update($data_chat);

        return response()->json([
            "error"     => $validator->errors(),
            "chat"      => $chat
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();
        return response()->json([
            'data' => [],
            'message' => 'Post deleted successfully',
            'success' => true
        ]);
    }
}
