<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSizesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'size' => ['required', 'min:3', 'unique:sizes'],
            'price' => ['required', 'numeric'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения!',
            'min' => 'Минимальная длина поля - :min',
            'numeric' => 'Поле должно содержать только цифры',
            'unique' => 'Размер уже существует'
        ];
    }

    public function attributes()
    {
        return [
            'size' => 'Размер',
            'price' => 'Цена',
        ];
    }
}
