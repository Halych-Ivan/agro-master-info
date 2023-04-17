<?php

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




Route::get('/', function () {
    return view('welcome');
});


Route::get('/test-db-connection', function () {
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
        return "Підключення до бази даних успішне!";
    } catch (\Exception $e) {
        return "Помилка підключення до бази даних: " . $e->getMessage();
    }
});


