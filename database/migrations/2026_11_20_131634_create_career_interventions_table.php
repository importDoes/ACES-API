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
        Schema::create('career_interventions', function (Blueprint $table) {
            $table->id('career_intervention_id');
            $table->unsignedBigInteger('pathway_recommendation_id');
            $table->longText('intervention_description');
            $table->string('intervention_category');
            $table->string('priority_level');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pathway_recommendation_id')
                ->references('pathway_recommendation_id')
                ->on('pathway_recommendations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_interventions');
    }
};
