<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMainPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'header' => ['min:3'],
            'text' => ['min:3'],
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Минимальная длина поля - :min',
        ];
    }

    public function attributes()
    {
        return [
            'header' => 'Заголовок',
            'text' => 'Текст',
        ];
    }
}
