<?php

// to do bootstrap,web route,calendar.js,show id,front,constante
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObligationController;
use App\Http\Controllers\EventController;

use App\Http\Controllers\EvenementsController;
use App\Http\Controllers\OrganismesController;
use App\Http\Controllers\ProfilsController;
use App\Http\Controllers\ContactsController;
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
  Route::get('evenements', [EvenementsController::class,'index'])->name('evenements');
  Route::get('evenements/create', [EvenementsController::class,'create'])->name('evenements_create');
  Route::post('evenements/create', [EvenementsController::class,'store']);
  Route::get('evenements/edit/{evenement}', [EvenementsController::class,'edit'])->name('evenements_edit');
  Route::post('evenements/edit/{evenement}', [EvenementsController::class,'update']);


  Route::get('organismes', [OrganismesController::class,'index'])->name('organismes');
  Route::get('organismes/create', [OrganismesController::class,'create'])->name('organismes_create');
  Route::post('organismes/create', [OrganismesController::class,'store']);
  Route::get('organismes/edit/{organisme}', [OrganismesController::class,'edit'])->name('organismes_edit');
  Route::post('organismes/edit/{organisme}', [OrganismesController::class,'update']);

  Route::get('profils', [ProfilsController::class,'index'])->name('profils');
  Route::get('profils/create', [ProfilsController::class,'create'])->name('profils_create');
  Route::post('profils/create', [ProfilsController::class,'store']);
  Route::get('profils/edit/{profil}', [ProfilsController::class,'edit'])->name('profils_edit');
  Route::post('profils/edit/{profil}', [ProfilsController::class,'update']);


});
