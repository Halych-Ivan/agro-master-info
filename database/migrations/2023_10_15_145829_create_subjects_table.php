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
            $table->string('info')->nullable();
            $table->string('abbr')->nullable();
            $table->string('link')->nullable();
            $table->string('control')->nullable();
            $table->string('semester')->nullable();
            $table->string('teacher')->nullable();
            $table->string('content')->nullable();
            $table->string('size')->nullable();
            $table->string('syllabus')->nullable();
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->string('year')->nullable();

            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('set null');

            $table->boolean('is_main')->default(false);
            $table->boolean('is_active')->default(false);

//            $table->foreignId('cathedra_id')->references('id')->on('cathedras');
//            $table->unsignedBigInteger('cathedra_id');
//            $table->index('cathedra_id', 'subject_cathedra_idx');
//            $table->foreign('cathedra_id', 'subject_cathedra_fk')->references('id')->on('cathedras');

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
