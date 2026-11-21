<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('question_options', function (Blueprint $table) {
             $table->id('question_option_id');
            $table->unsignedBigInteger('assessment_question_id');
            $table->unsignedBigInteger('student_id');
            $table->string('option_text');
            $table->unsignedBigInteger('sequence_number');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assessment_question_id')
                ->references('assessment_question_id')
                ->on('assessment_questions');

            $table->foreign('student_id')
                ->references('id')
                ->on('students');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};
