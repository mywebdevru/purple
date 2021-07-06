<?php

namespace App\Http\Controllers\API;

use App\Events\ChatStartRequestEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResource;
use App\Http\Resources\MessageResourceCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

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
        $this->setChatActive(User::find($data['recipient_id']));

        return new MessageResource($message);
    }

    public function startChat(Request $request): void
    {
        $alien = User::find($request->input('alien'));
        $this->setChatActive($alien);
        event(new ChatStartRequestEvent($alien));
    }

    public function kickChat (Request $request): ?Response
    {
        /** @var User $user */
        $user = auth()->user();
        if ($chatId = $request->input('chat')) {
            $user->chats()->detach($chatId);
            return response()->noContent();
        }
        abort(404, 'Чат не найден');
        return null;
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
        $userIds = collect();
        $activeChats = auth()->user()->chats->pluck('id');
        $sent->concat($received)->sortByDesc('message_at')->each(function ($item) use ($activeChats, $userIds) {
            if (!$userIds->contains($item['user_id']) && $activeChats->contains($item['user_id'])) {
                $userIds->push($item['user_id']);
            }
        });
        $users = collect();
        $userIds->each(function ($item) use ($users) {
            $users->push(User::find($item));
        });
        return new UserResourceCollection($users);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function setChatActive (User $recipient): void
    {
        Auth::user()->chats()->syncWithoutDetaching($recipient);
        $recipient->chats()->syncWithoutDetaching(Auth::user());
    }

}
