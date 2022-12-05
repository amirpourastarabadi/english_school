<?php

namespace App\Http\Requests\Api\V1\Teachers\Courses;

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
            'title'       => ['required', 'string', 'min:4'],
            'category_id' => ['nullable', 'exists:categories, id'],
            'book_id'     => ['nullable', 'exists:books, id'],
            'cost'        => ['nullable', 'numeric', 'min:0'],
        ];
    }
}
