<?php

use App\Http\Controllers\LogicTestController;
use App\Http\Controllers\TechnicalTestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/prueba-logica', [LogicTestController::class,'index'])->name('prueba-logica');

    Route::get('/prueba-tecnica', [TechnicalTestController::class,'index'])->name('prueba-tecnica');
});
