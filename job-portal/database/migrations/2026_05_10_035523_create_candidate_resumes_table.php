<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidate_resumes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('resume_title');

            $table->string('resume_file')->nullable();

            $table->boolean('is_default')->default(false);

            $table->text('career_objective')->nullable();

            $table->longText('work_experience')->nullable();

            $table->longText('education')->nullable();

            $table->longText('skills')->nullable();

            $table->longText('certifications')->nullable();

            $table->longText('languages')->nullable();

            $table->longText('projects')->nullable();

            $table->longText('references')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidate_resumes');
    }
};