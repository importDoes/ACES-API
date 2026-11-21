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
        Schema::create('learner_indicator_scores', function (Blueprint $table) {
           $table->id('learner_indicator_score_id');
            $table->unsignedBigInteger('assessment_session_id');
            $table->unsignedBigInteger('indicator_id');
            $table->decimal('raw_score', 10, 2);
            $table->decimal('normalized_score', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assessment_session_id')
                ->references('assessment_session_id')
                ->on('assessment_sessions');

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
        Schema::dropIfExists('learner_indicator_scores');
    }
};
