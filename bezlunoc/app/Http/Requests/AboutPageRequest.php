<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => ['min:3', 'unique:contents'],
            'photo' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Минимальная длина поля - :min',
            'unique' => 'Контент не должен повторятся',
            'required' => 'Обязательно для заполнения!',
        ];
    }

    public function attributes()
    {
        return [
            'text' => 'Текст',
            'photo' => 'Медиа'
        ];
    }
}
