<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ক্যাটাগরির নাম (যেমন: IT & Telecomm)
            $table->string('slug')->unique(); // URL এর জন্য (যেমন: it-telecomm)
            $table->string('icon')->nullable(); // ইমোজি বা ফন্ট-অসাম আইকন
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};