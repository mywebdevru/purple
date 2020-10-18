<?php

namespace App\Http\Resources;

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
        return [
            'data' => [
                'type' => 'messages',
                'message_id' => $this->id,
                'attributes' => [
                    'posted_by' => new UserResource($this->user),
                    'posted_to' => new UserResource($this->recipient),
                    'body' => $this->body,
                ],
            ],
            'links' => [
                'self' => url('/messages/' . $this->id),
            ],
        ];
    }
}
