<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('candidate_profiles', function (Blueprint $table) {

            $table->string('headline')->nullable();

            $table->text('bio')->nullable();

            $table->date('date_of_birth')->nullable();

            $table->string('gender')->nullable();

            $table->string('nationality')->nullable();

            $table->string('marital_status')->nullable();

            $table->string('phone')->nullable();

            $table->string('current_location')->nullable();

            $table->string('current_job_title')->nullable();

            $table->string('experience_level')->nullable();

            $table->string('expected_salary')->nullable();

            $table->string('preferred_job_type')->nullable();

            $table->string('preferred_location')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('candidate_profiles', function (Blueprint $table) {

            $table->dropColumn([

                'headline',
                'bio',
                'date_of_birth',
                'gender',
                'nationality',
                'marital_status',
                'phone',
                'current_location',
                'current_job_title',
                'experience_level',
                'expected_salary',
                'preferred_job_type',
                'preferred_location'

            ]);

        });
    }
};