<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => ['required', 'regex:/^((?=.*\d)(?=.*[a-zA-Z]).{8,})$/i'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения!',
            'regex' => 'Введены некорректные данные!',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Пароль',
        ];
    }
}
