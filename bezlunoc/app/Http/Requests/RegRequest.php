<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'regex:/^[а-яё\s\-]+$/iu'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'regex:/^((?=.*\d)(?=.*[a-zA-Z]).{8,})$/i'],
            'numberOfPhone' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения!',
            'unique' => 'Пользователь с такими данными уже существует!',
            'regex' => 'Введены некорректные данные!',
            'email' => 'Email должен быть валидным!',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль',
            'numberOfPhone' => 'Логин',
        ];
    }
}
