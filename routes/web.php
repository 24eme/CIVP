<?php

// to do bootstrap,web route,calendar.js,show id,front,constante
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObligationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CalendarController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
  return view('index');
});

Route::get('/showObligations', [ObligationController::class,'show'])->name('showObligation');
Route::get('/exportObligation/{id}', [ObligationController::class,'export'])->name('exportObligation');

Route::get('/exterieur', [EventController::class,'strangers']);
Route::get('/showEvents', [EventController::class,'show']);
Route::get('/creation/evenement', function () {return view('pass-accessible-page');});

/*implementer resources route*/


/* Admin Routes*/
Route::prefix('admin')->group(function () {
    Route::get('/', [CalendarController::class,'manage']);
    Route::post('/createObligation', [ObligationController::class,'create'])->name('createObligation');
    Route::post('/updateObligation', [ObligationController::class,'update'])->name('updateObligation');
    Route::get('/deleteObligation/{id}', [ObligationController::class,'delete'])->name('deleteObligation');

    Route::get('/contact', function () {return view('admin');});
    Route::get('/filters', function () {return view('components/partials/_filtering');});

    Route::post('/importCSV', [CalendarController::class,'importCSV'])->name('importCSV');
    Route::get('/showObligations', [ObligationController::class,'show']);
});
