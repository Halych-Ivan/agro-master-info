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
        Schema::create('statements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('subject_id')->nullable();
            $table->foreignId('group_id')->nullable();
            $table->foreignId('teacher_id')->nullable()->constrained(); // Припустимо, що таблиця викладачів називається "teachers"
            $table->foreignId('student_id')->nullable()->constrained(); // nullable, оскільки відомість може бути загальною для групи
            $table->integer('grade')->nullable();
            $table->string('date')->nullable();

            $table->json('students')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statements');
    }
};
