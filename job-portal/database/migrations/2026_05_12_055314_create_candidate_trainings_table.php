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
        Schema::create('candidate_trainings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('candidate_profile_id')->constrained()->onDelete('cascade');
    $table->string('training_title'); // কোর্সের নাম
    $table->string('institution');    // প্রতিষ্ঠানের নাম
    $table->string('duration');       // সময়কাল (যেমন: ৩ মাস)
    $table->string('passing_year');   // শেষ করার বছর
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_trainings');
    }
};
