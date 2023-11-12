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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('grade')->nullable();
            $table->string('rank')->nullable();
            $table->string('email')->nullable();
            $table->string('link')->nullable();
            $table->string('photo')->nullable();
            $table->string('meet')->nullable();
            $table->string('info')->nullable();
            $table->string('position')->nullable();

            $table->boolean('is_active')->default(false);
            $table->foreignId('cathedra_id');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
