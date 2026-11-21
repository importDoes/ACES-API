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
        Schema::create('option_indicator_scores', function (Blueprint $table) {
            $table->id('option_indicator_score_id');
            $table->unsignedBigInteger('question_option_id');
            $table->unsignedBigInteger('indicator_id');
            $table->string('score_value');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('question_option_id')
                ->references('question_option_id')
                ->on('question_options');

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
        Schema::dropIfExists('option_indicator_scores');
    }
};
