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
        Schema::create('candidate_educations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('candidate_profile_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('qualification_level')->nullable();

            $table->string('group_subject')->nullable();

            $table->string('institution_name')->nullable();

            $table->string('board_university')->nullable();

            $table->string('passing_year')->nullable();

            $table->string('roll_registration')->nullable();

            $table->string('cgpa_grade')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_educations');
    }
};