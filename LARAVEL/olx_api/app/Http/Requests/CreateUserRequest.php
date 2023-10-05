<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest {

    public function rules(): array {
        return [        // regras de requisição
            'name'=> 'required|min:3|string',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:6|string',
            'state_id'=> 'required|exists:states,id',
        ];
    }

    protected function failedValidation(Validator $validator): void {     // tratando o erro e o retornando em formato de 'json'
        throw new HttpResponseException(
            response()-> json(
                [
                    'error'=> $validator-> errors(),
                    'status'=> 'error'
                ]
            )
        );        
    }
}
