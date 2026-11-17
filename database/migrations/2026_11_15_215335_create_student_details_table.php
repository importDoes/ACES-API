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
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('students');

            $table->foreignId('role_id')
                ->constrained('roles');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('age');
            $table->string('gender');

            $table->foreignId('addresses')
                ->constrained('addresses');

            $table->string('birthdate');
            $table->string('contact_number');
            $table->string('parent_guardian_name');
            $table->string('guardian_contact_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_details');
    }
};
