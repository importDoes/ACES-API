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
        Schema::create('assessment_sessions', function (Blueprint $table) {
             $table->id('assessment_session_id');
            $table->unsignedBigInteger('student_id');
            $table->dateTime('started_at');
            $table->dateTime('completed_at')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('assessment_sessions');
    }
};
