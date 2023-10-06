<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class signinInRequest extends FormRequest {
    
    public function rules(): array     {
        return [        // regras de login
            'email'=> 'required|email|max:255',
            'password'=> 'requird|min:3|max:255'
        ];
    }

    protected function failedValidation(Validator $validator): void {     // tratando o erro e o retornando em formato de 'json'
        throw new HttpResponseException(
            response()-> json(
                [
                    'error'=> array_values($validator-> errors()-> getMessages())[0][0],
                ]
            )
        );        
    }
}
