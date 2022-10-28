<?php

namespace Database\Seeders;

use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(ExamSeeder::class);
        $this->call(ExamStudentSeeder::class);
    }
}
