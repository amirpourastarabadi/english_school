<?php

namespace App\Http\Requests\Api\V1\Teachers\Exams;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $teacherCourses = auth()->user()->courses->pluck('id')->toArray();
        return [
            'title' => ['required', 'string', 'min:4'],
            'course_id' => ['nullable', Rule::exists('courses', 'id')->whereIn('id', $teacherCourses)]
        ];
    }
}
