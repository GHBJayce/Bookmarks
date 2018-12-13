<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'code' => 422,
            'msg' => $validator->errors()->first(),
            'data' => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, 422));
    }
}