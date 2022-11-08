<?php

namespace App\Http\Requests\Api\V1\Students;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'mobile'                => 'required|unique:teachers,mobile',
            'password'              => ['required', 'string', 'min:' . config('validations.password.min_length', 8), 'confirmed'],
            'password_confirmation' => 'required',
        ];
    }
}
