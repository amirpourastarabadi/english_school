<?php

namespace App\Http\Requests\Api\V1\Teachers\Questions;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'problem_description' => ['required', 'string', 'max:256', 'min:2'],
            'question_type_id'    => ['required', 'exists:question_types,id'],
            'picture'             => ['nullable', 'string', 'max:200'],
            'score'               => ['required', 'numeric', 'min:0.25'],
        ];
    }
}
