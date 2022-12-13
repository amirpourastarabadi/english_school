<?php

namespace App\Http\Resources\Api\V1\Students\ExamReports;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class Report extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'question_id' => $this->question_id,
            'answered_id' => $this->answered_id,
            'is_correct'  => $this->is_correct
        ];
    }
}
