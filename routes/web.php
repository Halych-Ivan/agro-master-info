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
Route::view('/science','agromaster.science')->name('science');
Route::view('/admission','agromaster.admission.001')->name('admission'); // Вступ
Route::view('/admission/confirmation','agromaster.admission.confirmation')->name('admission/confirmation'); // Вступ

Route::view('/schedule','agromaster.schedule')->name('schedule'); // Розклад занять
Route::view('/session','agromaster.session')->name('session'); // Розклад занять
Route::view('/lists','agromaster.lists')->name('lists'); // Списки груп
Route::view('/details','agromaster.details')->name('details'); // Реквізити
Route::view('/reference','agromaster.reference')->name('reference'); // Довідки

Route::view('/22884db148f0ffb0d830ba431102b0b5','agromaster.module')->name('module'); // Довідки




Route::get('/', function () {
    return view('agromaster.main');
//    return view('agromaster.layout');
})->name('home');


// php artisan config:clear
Route::get('/clear-config', function() {
    $exitCode = Artisan::call('config:clear');
    return 'Конфігурацію очищено!'; // або англійською: 'Config cache cleared!'
});











Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/test','agromaster.test')->name('test');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
