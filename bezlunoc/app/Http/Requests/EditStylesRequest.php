<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStylesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'style' => ['min:3', 'unique:styles'],
            'price' => ['numeric'],
        ];
    }

    public function messages()
    {
        return [
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
