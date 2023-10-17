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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->string('abbr')->nullable();
            $table->string('link')->nullable();
            $table->string('syllabus')->nullable();
            $table->string('program')->nullable();
            $table->string('image')->nullable();
            $table->string('info')->nullable();
            $table->string('semester')->nullable();
            $table->string('control')->nullable();
            $table->string('size')->nullable();
            $table->string('lecture')->nullable();
            $table->string('practical')->nullable();
            $table->string('laboratory')->nullable();
            $table->string('description')->nullable();
            $table->string('teacher')->nullable();

            $table->boolean('is_main')->default(false);
            $table->boolean('is_active')->default(false);

            $table->foreignId('program_id')->references('id')->on('programs');
            $table->foreignId('cathedra_id')->references('id')->on('cathedras');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
