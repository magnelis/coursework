<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTattooRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'photo' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения!',
            'min' => 'Минимальная длина поля - :min',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название',
            'photo' => 'Фотография',
        ];
    }
}
