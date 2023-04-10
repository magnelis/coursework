<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStylesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'style' => ['required', 'min:3', 'unique:styles'],
            'price' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения!',
            'min' => 'Минимальная длина поля - :min',
            'numeric' => 'Поле должно содержать только цифры',
            'unique' => 'Стиль уже существует'
        ];
    }

    public function attributes()
    {
        return [
            'style' => 'Стиль',
            'price' => 'Цена',
        ];
    }
}
