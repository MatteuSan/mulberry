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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number')->unique();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('courses')->nullable();
            $table->foreignId('department_id')->constrained();
            $table->boolean('is_dean')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
