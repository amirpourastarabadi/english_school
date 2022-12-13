<?php

namespace App\Http\Resources\Api\V1\Students\ExamReports;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReportCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'true_answers' => $this->getTrueAnswersCount(),
                'false_answers' => $this->getFalseAnswersCount(),
                'no_answers' => $this->getNoAnswersCount(),
                'percent' => $this->calcPercent()
            ]
        ];
    }

    private function getTrueAnswersCount()
    {
        return $this->collection->where('is_correct', '=', true)->count();
    }

    private function getNoAnswersCount()
    {
        return $this->collection->whereNull('is_correct')->count();
    }

    private function getFalseAnswersCount()
    {
        return $this->collection->where('is_correct', '=', false)->count();
    }

    private function getTotalCount()
    {
        return $this->collection->count();
    }

    private function calcPercent()
    {
        return (($this->getTrueAnswersCount() * 3 - $this->getFalseAnswersCount()) / ($this->getTotalCount() * 3) ) * 100;
    }
}
