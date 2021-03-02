<?php

// to do bootstrap,web route,calendar.js,show id,front,constante
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganismeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\TagController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//   return view('index');
// });
Route::get('/', [CalendarController::class,'indexAll']);
Route::get('/showObligations', [ObligationController::class,'show'])->name('showObligation');
Route::get('/exportObligation/{id}', [ObligationController::class,'export'])->name('exportObligation');

Route::get('/exterieur', [EventController::class,'strangers']);
Route::get('/showEvents', [EventController::class,'show']);
Route::get('/creation/evenement', function () {return view('pass-accessible-page');});

/*implementer resources route*/


/* Admin Routes*/
Route::prefix('admin')->group(function () {
  Route::get('/', function () { return redirect()->route('evenements');; });
  Route::get('evenements', [EvenementController::class,'index'])->name('evenements');
  Route::get('evenement/create', [EvenementController::class,'create'])->name('evenement_create');
  Route::post('evenement/create', [EvenementController::class,'store']);
  Route::get('evenement/edit/{evenement}', [EvenementController::class,'edit'])->name('evenement_edit');
  Route::post('evenement/edit/{evenement}', [EvenementController::class,'update']);


  Route::get('organismes', [OrganismeController::class,'index'])->name('organismes');
  Route::get('organisme/create', [OrganismeController::class,'create'])->name('organisme_create');
  Route::post('organisme/create', [OrganismeController::class,'store']);
  Route::get('organisme/edit/{organisme}', [OrganismeController::class,'edit'])->name('organisme_edit');
  Route::post('organisme/edit/{organisme}', [OrganismeController::class,'update']);

  Route::get('profils', [ProfilController::class,'index'])->name('profils');
  Route::get('profil/create', [ProfilController::class,'create'])->name('profil_create');
  Route::post('profil/create', [ProfilController::class,'store']);
  Route::get('profil/edit/{profil}', [ProfilController::class,'edit'])->name('profil_edit');
  Route::post('profil/edit/{profil}', [ProfilController::class,'update']);

  Route::get('familles', [FamilleController::class,'index'])->name('familles');
  Route::get('famille/create', [FamilleController::class,'create'])->name('famille_create');
  Route::post('famille/create', [FamilleController::class,'store']);
  Route::get('famille/edit/{famille}', [FamilleController::class,'edit'])->name('famille_edit');
  Route::post('famille/edit/{famille}', [FamilleController::class,'update']);


});
