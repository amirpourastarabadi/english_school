<?php

namespace App\Http\Requests\Student\Exams;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnswersheet extends FormRequest
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
            'answersheet' => 'required|array',
            'answersheet.*.question_id' => 'required|exists:answer_question,question_id',
            'answersheet.*.answer_id' => 'required|exists:answer_question,answer_id',
        ];
    }

    public function prepareForValidation()
    {
        $answersheet = [];
        foreach($this->except('_token') as $question_id => $answer_id)
        {
            $answersheet[] = ['question_id' => $question_id, 'answer_id' => $answer_id, 'student_id' => 1];
        }
        
        $this->merge([
            'answersheet' => $answersheet
        ]);
    }
}
