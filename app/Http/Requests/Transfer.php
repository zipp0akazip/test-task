<?php

namespace App\Http\Requests;

class Transfer extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from' => 'required|integer|exists:users,id',
            'to' => 'required|integer|exists:users,id',
            'amount' => 'required|integer|min:1',
        ];
    }
}
