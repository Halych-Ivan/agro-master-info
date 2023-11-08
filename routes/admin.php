<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LevelsController;
use App\Http\Controllers\Admin\SpecialtiesController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\GroupsController;
use App\Http\Controllers\Admin\CathedrasController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\TeachersController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\DocumentsController;
use App\Http\Controllers\Admin\ImportController;



//************************************************************
// Admin panel
//************************************************************
Route::prefix('admin')->name('admin.')->group(function (){
//Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function (){

    Route::view('/','admin.index')->name(''); //

    Route::resource('levels', LevelsController::class);
    Route::resource('specialties', SpecialtiesController::class);
    Route::resource('programs', ProgramsController::class);
    Route::resource('groups', GroupsController::class); // Навчальні групи
    Route::resource('cathedras', CathedrasController::class); // Кафедри
    Route::resource('subjects', SubjectsController::class); // Дисципліни
    Route::resource('teachers', TeachersController::class); // Викладачі
    Route::resource('students', StudentsController::class); // Викладачі
    Route::resource('documents', DocumentsController::class); // Документи



    Route::get('select/{id}', [StudentsController::class, 'select'])->name('students.select'); // Вибір дисциплін
    Route::get('update_plan/{id}', [StudentsController::class, 'update_plan'])->name('students.update_plan'); // Вибір дисциплін
    Route::get('subjects/{id}/add_teacher/{teacher?}/{main?}', [SubjectsController::class, 'add_teacher'])->name('subjects.add_teacher'); // Довідки
    Route::get('subjects/{id}/dell_teacher/{teacher}', [SubjectsController::class, 'dell_teacher'])->name('subjects.dell_teacher'); // Довідки

    Route::get('import', [ImportController::class, 'import_form'])->name('import'); // Імпорт із Exel
    Route::post('import', [ImportController::class, 'import'])->name('import'); // Імпорт із Exel
});
