<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Http\Resources\MessageResourceCollection;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MessageResourceCollection
     */
    public function index()
    {
        $data = request()->validate([
            'recipient_id' => ''
        ]);

        return new MessageResourceCollection(Message::chatMessages($data['recipient_id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return MessageResource
     */
    public function store()
    {
        $data = request()->validate([
            'recipient_id' => '',
            'body' => '',
        ]);

        $message = request()->user()->messages()->create($data);
        return new MessageResource($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
