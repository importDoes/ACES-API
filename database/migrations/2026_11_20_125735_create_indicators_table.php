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
        Schema::create('indicators', function (Blueprint $table) {
              $table->id('indicator_id');
            $table->unsignedBigInteger('assessment_dimension_id');
            $table->unsignedBigInteger('indicator_code')->unique();
            $table->string('indicator_name');
            $table->string('indicator_type');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assessment_dimension_id')
                ->references('assesment_dimension_id')
                ->on('assessment_dimensions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicators');
    }
};
