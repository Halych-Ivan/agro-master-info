<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('file')->nullable();
            $table->string('plan_full')->nullable();
            $table->string('plan_extra')->nullable();
            $table->string('plan_dual')->nullable();
            $table->string('code')->nullable();
            $table->string('image')->nullable();
            $table->string('info')->nullable();
            $table->string('year')->nullable();

            $table->foreignId('specialty_id')->references('id')->on('specialties');
            $table->foreignId('level_id')->references('id')->on('levels');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
};
