<?php
/**
 * Created by PhpStorm.
 * User: zip
 * Date: 01.11.2017
 * Time: 18:46
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class BaseRequest extends FormRequest
{
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = collect([]);

        foreach ($validator->errors()->getMessages() as $fieldErrors) {
            foreach ($fieldErrors as $error) {
                $errors->push($error);
            }
        }

        throw new \Illuminate\Http\Exceptions\HttpResponseException(new JsonResponse($errors, '422'));
    }
}