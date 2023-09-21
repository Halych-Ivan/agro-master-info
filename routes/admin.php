<?php

use Illuminate\Support\Facades\Route;


//************************************************************
// Admin panel
//************************************************************

Route::prefix('admin')->name('admin.')->group(function (){
//Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function (){

    Route::view('/','admin.index')->name('');

    Route::resource('levels', App\Http\Controllers\Admin\LevelsController::class);

    Route::resource('specialties', App\Http\Controllers\Admin\SpecialtiesController::class);

    Route::resource('programs', App\Http\Controllers\Admin\ProgramsController::class);




//    Route::resource('cathedras', App\Http\Controllers\Admin\CathedrasController::class);
//    Route::resource('teachers', App\Http\Controllers\Admin\TeachersController::class);
//
//    Route::resource('groups', App\Http\Controllers\Admin\GroupsController::class);
//    Route::resource('students', App\Http\Controllers\Admin\StudentsController::class);
//
//    Route::resource('subjects', App\Http\Controllers\Admin\SubjectsController::class);
//    Route::resource('plans', App\Http\Controllers\Admin\PlansController::class);

});
