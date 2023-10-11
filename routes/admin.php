<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LevelsController;
use App\Http\Controllers\Admin\SpecialtiesController;
use App\Http\Controllers\Admin\ProgramsController;



//************************************************************
// Admin panel
//************************************************************
Route::prefix('admin')->name('admin.')->group(function (){
//Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function (){

    Route::view('/','admin.index')->name(''); //

    Route::resource('levels', LevelsController::class);
    Route::resource('specialties', SpecialtiesController::class);
    Route::resource('programs', ProgramsController::class);



//
//
//    Route::resource('cathedras', App\Http\Controllers\Admin\CathedrasController::class);
//    Route::resource('teachers', App\Http\Controllers\Admin\TeachersController::class);
//
//    Route::resource('groups', App\Http\Controllers\Admin\GroupsController::class);
//    Route::resource('students', App\Http\Controllers\Admin\StudentsController::class);
//
//
//
//
//    Route::resource('subjects', App\Http\Controllers\Admin\SubjectsController::class);
//    Route::resource('plans', App\Http\Controllers\Admin\PlansController::class);
});
