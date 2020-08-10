<?php

namespace App\Http\Resources\Profile;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /**
         * @var $this User
         */
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date ? $this->birth_date->format('Y-m-d') : null,
            'city' => $this->city,
            'country' => $this->country,
            'creed' => $this->creed,
        ];
    }
}
