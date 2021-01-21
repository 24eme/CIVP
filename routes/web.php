<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObligationController;
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
  return view('index');
});

Route::get('/showObligations', [ObligationController::class,'show']);
Route::post('/createObligation', [ObligationController::class,'create'])->name('createObligation');
Route::post('/updateObligation', [ObligationController::class,'update']);
Route::get('/deleteObligation/{id}', [ObligationController::class,'delete']);

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
      return view('index');
    });
});
