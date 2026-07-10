<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('applications', function (Blueprint $table) {

        if (!Schema::hasColumn('applications', 'is_shortlisted')) {
            $table->boolean('is_shortlisted')->default(false);
        }

        if (!Schema::hasColumn('applications', 'interview_date')) {
            $table->date('interview_date')->nullable();
        }

        if (!Schema::hasColumn('applications', 'interview_time')) {
            $table->time('interview_time')->nullable();
        }

        if (!Schema::hasColumn('applications', 'interview_location')) {
            $table->string('interview_location')->nullable();
        }

        if (!Schema::hasColumn('applications', 'interview_message')) {
            $table->text('interview_message')->nullable();
        }

        if (!Schema::hasColumn('applications', 'interview_mail_sent')) {
            $table->boolean('interview_mail_sent')->default(false);
        }

    });
}

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {

            $table->dropColumn([
                'is_shortlisted',
                'interview_date',
                'interview_time',
                'interview_location',
                'interview_message',
                'interview_mail_sent'
            ]);

        });
    }
};