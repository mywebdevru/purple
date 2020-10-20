<?php

namespace App\Http\Resources;

use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Message $this */
        return [
            'data' => [
                'type' => 'messages',
                'message_id' => $this->id,
                'attributes' => [
                    'sent_by' => new UserResource($this->user),
                    'sent_to' => new UserResource($this->recipient),
                    'body' => $this->body,
                    'user_message' => $this->user->id === auth()->user()->id,
                    'sent_at' => $this->created_at->diffForHomans(),
                ],
            ],
            'links' => [
                'self' => url('/messages/' . $this->id),
            ],
        ];
    }
}
