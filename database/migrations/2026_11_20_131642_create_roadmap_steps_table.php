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
        Schema::create('roadmap_steps', function (Blueprint $table) {
            $table->id('roadmap_step_id');
            $table->unsignedBigInteger('career_intervention_id');
            $table->unsignedBigInteger('step_number');
            $table->string('step_title');
            $table->longText('step_description');
            $table->string('suggested_resource')->nullable();
            $table->string('completion_status');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('career_intervention_id')
                ->references('career_intervention_id')
                ->on('career_interventions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roadmap_steps');
    }
};
