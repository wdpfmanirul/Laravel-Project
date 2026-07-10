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
    Schema::create('candidate_profiles', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('district')->nullable();
        $table->string('thana')->nullable();
        $table->string('post_office')->nullable();
        $table->text('address')->nullable();
        $table->string('alternate_mobile')->nullable();
        $table->integer('age')->nullable();
        $table->text('skills')->nullable();
        $table->text('education')->nullable();
        $table->string('photo')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_profiles');
    }
};
