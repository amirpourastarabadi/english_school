<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_sheets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->references('id')->on('students')->cascadeOnDelete();

            $table->foreignId('exam_id')->references('id')->on('exams');

            $table->foreignId('question_id')->references('id')->on('questions');

            $table->smallInteger('answered_id')->nullable();

            $table->timestamp('submitted_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_sheets');
    }
}
