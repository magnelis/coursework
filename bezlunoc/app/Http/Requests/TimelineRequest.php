<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimelineRequest extends FormRequest
{
    public function rules()
    {
        return [
            'date' => ['required'],
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
            'date' => 'Дата',
        ];
    }
}
