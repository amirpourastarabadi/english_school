<?php

namespace App\Http\Requests\Api\V1\Teachers\Answers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'is_correct' => ['required', 'boolean'],
            'body'       => ['required', 'string', 'max:256'],
        ];
    }
}
