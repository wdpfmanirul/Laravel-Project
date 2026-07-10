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
        Schema::create('candidate_experiences', function (Blueprint $table) {

            $table->id();

            $table->foreignId('candidate_profile_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('company_name')->nullable();

            $table->string('job_title')->nullable();

            $table->string('employment_type')->nullable();

            $table->date('start_date')->nullable();

            $table->date('end_date')->nullable();

            $table->boolean('currently_working')->default(false);

            $table->text('responsibilities')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_experiences');
    }
};