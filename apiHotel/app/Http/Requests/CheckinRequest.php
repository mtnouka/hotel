<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckinRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'entranceDate.required' => 'O campo data de entrada é obrigatório.',
            'aditionalVehicle.required' => 'O campo Veículo adicional não pode estar vazio.',
            'aditionalVehicle.min' => 'Caracteres insuficientes para o campo Veículo adicional.',
            'aditionalVehicle.max' => 'Caracteres excessivos para o campo Veículo adicional.',
            'fkGuest.required' => 'O campo Hóspede é obrigatório.'
        ];
    }

    public function rules()
    {
        return [
            'entranceDate' => 'required',
            'aditionalVehicle' => 'required|min:3|max:5',
            'fkGuest' => 'required'
        ];
    }
}
