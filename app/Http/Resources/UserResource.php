<?php

namespace App\Http\Resources;

use App\Models\Message;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var $this User */
        return [
            'data' => [
                'type' => 'users',
                'user_id' => $this->id,
                'attributes' => [
                    'name' => $this->name,
                    'surname' => $this->surname,
                    'avatar' => $this->avatar,
                    'wallpaper' =>$this->wallpaper,
                    'full_name' => $this->full_name,
                    'email' => $this->email,
                    'gender' => $this->gender,
                    'birth_date' => optional($this->birth_date)->format('Y-m-d'),
                    'created_at' => optional($this->created_at)->format('Y-m-d'),
                    'city' => $this->city,
                    'country' => $this->country,
                    'creed' => $this->creed,
                    'roles' => $this->getRoleNames(),
                ],
                'chat' => [
                    'messages_count' => Message::chatMessagesCount($this->id),
                    'unread_messages_count' => Message::chatUnreadMessagesCount($this->id),
                ],
            ],
            'links' => [
                'self' => url('/users/' . $this->id),
            ],
        ];
    }
}
