<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'time' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Обязательно к заполнению',
        ];
    }

    public function attributes()
    {
        return [
            'time' => 'Время',
        ];
    }
}
