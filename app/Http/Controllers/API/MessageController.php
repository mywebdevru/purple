<?php

namespace App\Http\Controllers\API;

use App\Events\ChatStartRequestEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Http\Resources\MessageResourceCollection;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

    public function startChat(Request $request): void
    {
        $alien = User::find($request->input('alien'));
        event(new ChatStartRequestEvent($alien));
    }

    public function chatList()
    {
        $sent = Message::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get(['user_id', 'recipient_id', 'created_at'])
            ->groupBy('recipient_id')->map(function ($item, $key) {
                return ['user_id' => $key, 'message_at' => $item[0]->created_at->format('Y-m-d H:i')];
            });
        $received = Message::where('recipient_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get(['user_id', 'recipient_id', 'created_at'])
            ->groupBy('user_id')->map(function ($item, $key) {
                return ['user_id' => $key, 'message_at' => $item[0]->created_at->format('Y-m-d H:i')];
            });
        $users = collect();
        $sent->concat($received)->sortByDesc('message_at')->each(function ($item) use ($users) {
            if (!$users->has($item['user_id'])) {
                $users->push($item['user_id']);
            }
        });
        return response()->json($users);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
