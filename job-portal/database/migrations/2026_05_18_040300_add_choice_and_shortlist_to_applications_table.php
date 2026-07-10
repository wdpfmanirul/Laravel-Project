<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {

            // 1st / 2nd / 3rd choice
            $table->integer('choice_order')->nullable();

            // shortlisted or not
            $table->boolean('is_shortlisted')->default(false);

            // interview message
            $table->text('interview_message')->nullable();

            // interview sent
            $table->boolean('interview_sent')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {

            $table->dropColumn([
                'choice_order',
                'is_shortlisted',
                'interview_message',
                'interview_sent'
            ]);
        });
    }
};