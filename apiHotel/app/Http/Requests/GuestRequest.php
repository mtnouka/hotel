<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'document.required' => 'O campo documento é obrigatório.',
            'document.max' => 'O campo documento excedeu o limite de caracteres.',
            'telephone.required' => 'O campo telefone é obrigatório.',
            'telephone.max' => 'O campo telefone excedeu o limite de caracteres.'
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'document' => 'required|max:11',
            'telephone' => 'required|max:11'
        ];
    }
}
