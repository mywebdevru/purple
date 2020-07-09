<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->user),
            ],
            /*|unique:users,email,' . $this->user,*/
            'surname'  => 'required',
            'avatar' => 'image|dimensions:min_width=100,min_height=100,max_width=800,max_height=800',
            'country' => 'required',
            'city' => 'required',
            'creed' => 'required',
            'birth_date' => 'date',
            'gender' => [
                'required',
                Rule::in(['Мужчина', 'Девушка', 'В смятении']),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо заполнить поле Имя',
            'surname.required' => 'Необходимо заполнить поле Фамилия',
        ];
    }
}
