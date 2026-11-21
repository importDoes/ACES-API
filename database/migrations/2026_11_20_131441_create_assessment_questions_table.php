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
        Schema::create('assessment_questions', function (Blueprint $table) {
            $table->id('assessment_question_id');
            $table->unsignedBigInteger('assessment_dimension_id');
            $table->unsignedBigInteger('indicator_id');
            $table->text('question_text');
            $table->string('response_type');
            $table->boolean('is_required');
            $table->unsignedBigInteger('sequence_number');
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assessment_dimension_id')
                ->references('assesment_dimension_id')
                ->on('assessment_dimensions');

            $table->foreign('indicator_id')
                ->references('indicator_id')
                ->on('indicators');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_questions');
    }
};
