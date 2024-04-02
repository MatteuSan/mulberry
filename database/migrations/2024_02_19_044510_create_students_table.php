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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number')->unique();
            $table->integer('year');
            $table->foreignId('program_id')->constrained();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('batch');
            $table->json('load')->nullable(); // json of courses loaded for the term
            $table->foreignId('grade_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
