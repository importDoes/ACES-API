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
        Schema::create('assessment_results', function (Blueprint $table) {
            $table->id('assessment_result_id');
            $table->unsignedBigInteger('assessment_session_id');
            $table->decimal('highest_compatibility_score', 10, 2);
            $table->unsignedBigInteger('career_pathway_id');
            $table->dateTime('generated_at');
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
        Schema::dropIfExists('assessment_results');
    }
};
