<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTattooRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['min:3'],
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Минимальная длина поля - :min'
        ];
    }
}
