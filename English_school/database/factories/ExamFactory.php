<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $titles = ['quize', 'mid term', 'final'];
        return [
            'course_id' => Course::factory(),
            'title'     => $titles[random_int(0, 2)],
            'time'      => random_int(10, 15),
        ];
    }
}
