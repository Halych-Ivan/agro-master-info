<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/newsletter','\App\Http\Controllers\MailController@newsletter')->name('newsletter');
Route::view('/contact','agromaster.contact')->name('contact');
Route::view('/science','welcome')->name('science');
Route::view('/schedule','agromaster.schedule')->name('schedule');




Route::get('/', function () {
    return view('agromaster.main');
//    return view('agromaster.layout');
})->name('home');


// php artisan config:clear
Route::get('/clear-config', function() {
    $exitCode = Artisan::call('config:clear');
    return 'Конфігурацію очищено!'; // або англійською: 'Config cache cleared!'
});




//************************************************************
// Admin panel
//************************************************************
Route::prefix('admin')->name('admin.')->group(function (){
//Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function (){

    Route::view('/','admin.index')->name(''); //


    Route::resource('levels', App\Http\Controllers\Admin\LevelsController::class);
    Route::resource('specialties', App\Http\Controllers\Admin\SpecialtiesController::class);
    Route::resource('programs', App\Http\Controllers\Admin\ProgramsController::class);



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






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
