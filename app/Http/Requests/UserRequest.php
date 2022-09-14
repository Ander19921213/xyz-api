<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'zip' => 'required',
        ];

    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));

    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatorio',
            'email.required' => 'Email é obrigatorio',
            'zip.required' => 'Cep é obrigatorio',
        ];

    }

}