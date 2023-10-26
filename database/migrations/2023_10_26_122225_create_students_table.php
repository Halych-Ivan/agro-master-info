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
            $table->string('name');
            $table->string('patronymic');
            $table->string('surname');
            $table->string('photo')->nullable();
            $table->string('sex')->nullable();
            $table->string('birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('passport')->nullable();
            $table->string('passport_series')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('passport_record')->nullable();
            $table->string('passport_date_issue')->nullable();
            $table->string('passport_date_expiry')->nullable();
            $table->string('passport_date_authority')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('code_ident')->nullable();

            $table->string('student_id')->nullable();
            $table->string('student_id_series')->nullable();
            $table->string('student_id_number')->nullable();
            $table->string('student_id_photo')->nullable();

            $table->string('address')->nullable();
            $table->string('address_region')->nullable();
            $table->string('address_district')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_street')->nullable();

            $table->string('school')->nullable();
            $table->string('school_document')->nullable();
            $table->string('school_document_series')->nullable();
            $table->string('school_document_number')->nullable();
            $table->string('school_document_date')->nullable();
            $table->string('school_document_photo')->nullable();
            $table->string('school_document_mark')->nullable();

            $table->string('gradebook')->nullable();

            $table->string('finance')->nullable();
            $table->string('case')->nullable();
            $table->string('contract')->nullable();
            $table->string('contract_sum')->nullable();
            $table->string('contract_date')->nullable();
            $table->string('study_start')->nullable();
            $table->string('study_end')->nullable();

            $table->string('order')->nullable();
            $table->string('order_in')->nullable();
            $table->string('order_in_data')->nullable();
            $table->string('order_out')->nullable();
            $table->string('order_out_data')->nullable();

            $table->string('mentor')->nullable();
            $table->string('info')->nullable();

            $table->boolean('is_active')->default(false);

            $table->foreignId('group_id');

            $table->softDeletes();
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
