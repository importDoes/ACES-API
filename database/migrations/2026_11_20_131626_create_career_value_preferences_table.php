<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_value_preferences', function (Blueprint $table) {
            $table->id('career_value_preference_id');
            $table->unsignedBigInteger('assessment_session_id');
            $table->unsignedBigInteger('indicator_id');
            $table->string('importance_level');
            $table->decimal('score', 10, 2);
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

    public function down(): void
    {
        Schema::dropIfExists('career_value_preferences');
    }
};
