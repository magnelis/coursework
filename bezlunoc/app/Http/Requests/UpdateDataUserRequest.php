<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDataUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['regex:/^[а-яё\s\-]+$/iu', 'min:3'],
            'email' => ['email'],
        ];
    }

    public function messages()
    {
        return [
            'regex' => 'Введены некорректные данные!',
            'email' => 'Email должен быть валидным!',
            'min' => 'Минимальная длина поля - :min'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'numberOfPhone' => 'Номер телефона'
        ];
    }
}
