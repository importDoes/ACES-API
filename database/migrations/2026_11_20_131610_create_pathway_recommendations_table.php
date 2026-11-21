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
        Schema::create('pathway_recommendations', function (Blueprint $table) {
            $table->id('pathway_recommendation_id');
            $table->unsignedBigInteger('assessment_session_id')->unique();
            $table->unsignedBigInteger('career_pathway_id');
            $table->decimal('interest_alignment_score', 10, 2);
            $table->decimal('skills_alignment_score', 10, 2);
            $table->decimal('academic_alignment_score', 10, 2);
            $table->decimal('compatibility_score', 10, 2);
            $table->unsignedBigInteger('recommendation_rank');
            $table->boolean('is_primary');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assessment_session_id')
                ->references('assessment_session_id')
                ->on('assessment_sessions');

            $table->foreign('career_pathway_id')
                ->references('career_pathway_id')
                ->on('career_pathways');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathway_recommendations');
    }
};
