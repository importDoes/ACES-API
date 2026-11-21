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
        Schema::create('pathway_indicator_mappings', function (Blueprint $table) {
            $table->id('pathway_indicator_mapping_id');
            $table->unsignedBigInteger('career_pathway_id');
            $table->unsignedBigInteger('indicator_id');
            $table->decimal('mapping_score', 10, 2);
            $table->text('mapping_rationale')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('career_pathway_id')
                ->references('career_pathway_id')
                ->on('career_pathways');

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
        Schema::dropIfExists('pathway_indicator_mappings');
    }
};
