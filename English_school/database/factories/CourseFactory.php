<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teacher_id'  => Teacher::factory(),
            'book_id'     => Book::factory(),
            'title'       => 'Family and Friends 4',
            'category_id' => Category::factory(),
            'cost'        => random_int(10, 20),
        ];
    }
}
