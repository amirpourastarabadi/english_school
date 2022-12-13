<?php

namespace App\Http\Requests\Api\V1\Students\AnswerSheets;

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
        $answers_size = $this->route()->exam->questions->count();
        return [
            'answers' => ['required', 'array', "size:$answers_size"],
            'answers.*' => ['nullable', 'integer']
        ];
    }
}
