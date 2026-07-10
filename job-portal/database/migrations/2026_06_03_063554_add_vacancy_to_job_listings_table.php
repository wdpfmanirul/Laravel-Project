<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('job_listings', function (Blueprint $table) {
        // integer টাইপ কলাম যোগ করছি, ডিফল্ট ১ দিচ্ছি
        $table->integer('vacancy')->default(1)->after('description'); 
    });
}

public function down()
{
    Schema::table('job_listings', function (Blueprint $table) {
        $table->dropColumn('vacancy');
    });
}
};
