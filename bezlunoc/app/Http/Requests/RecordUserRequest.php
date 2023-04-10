<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'date' => ['required'],
            'style_id' => ['required'],
            'size_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле обязательно для заполнения!',
        ];
    }

    public function attributes()
    {
        return [
            'date' => 'Дата',
            'style_id' => 'Стиль',
            'size_id' => 'Размер',
        ];
    }
}
