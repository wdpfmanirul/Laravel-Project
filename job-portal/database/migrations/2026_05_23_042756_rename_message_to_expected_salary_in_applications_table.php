<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // প্রথমে সব টেক্সট ডাটাকে '0' করে নিন যাতে Decimal এ কনভার্ট হতে সমস্যা না হয়
        DB::table('applications')->update(['message' => '0']);

        Schema::table('applications', function (Blueprint $table) {
            // এবার কলামটি পরিবর্তন করুন
            $table->decimal('message', 10, 2)->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->text('message')->nullable()->change();
        });
    }
};