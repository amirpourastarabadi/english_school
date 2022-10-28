<?php

namespace Database\Seeders;

use App\Models\ExamStudent;
use Illuminate\Database\Seeder;

class ExamStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExamStudent::factory(20)->create();
    }
}
