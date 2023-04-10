<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSizesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'size' => ['min:3', 'unique:sizes'],
            'price' => ['numeric'],
        ];
    }

    public function messages()
    {
        return [
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
