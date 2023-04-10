<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => ['min:3', 'unique:contents'],
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Минимальная длина поля - :min',
            'unique' => 'Контент не должен повторятся',
        ];
    }

    public function attributes()
    {
        return [
            'text' => 'Текст',
        ];
    }
}
