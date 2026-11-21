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
        Schema::create('assessment_responses', function (Blueprint $table) {
            $table->id('assessment_response_id');
            $table->unsignedBigInteger('assessment_session_id');
            $table->unsignedBigInteger('assessment_question_id');
            $table->unsignedBigInteger('question_option_id');
            $table->text('answer_text')->nullable();
            $table->dateTime('answered_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assessment_session_id')
                ->references('assessment_session_id')
                ->on('assessment_sessions');

            $table->foreign('assessment_question_id')
                ->references('assessment_question_id')
                ->on('assessment_questions');

            $table->foreign('question_option_id')
                ->references('question_option_id')
                ->on('question_options');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_responses');
    }
};
