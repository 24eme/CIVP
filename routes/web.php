<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganismeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CalendarController;

Route::get('/', function () { return redirect()->route('index');; });
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/evenement/list', [IndexController::class, 'listEvenements']);
Route::get('/evenement/{id}', [EvenementController::class,'popup'])->name('evenement_popup');

Route::get('/filter/type/{type}', [IndexController::class,'filterEvenementsByType'])->name('filterType');
Route::get('/filter/organisme/{organisme}', [IndexController::class,'filterEvenementsByOrganisme'])->name('filterOrganisme');

Route::prefix('admin')->group(function () {
  Route::get('/', function () { return redirect()->route('evenements');; });
  Route::post('/importCSV', [CalendarController::class,'importCSV'])->name('importCSV');

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

  Route::get('types', [TypeController::class,'index'])->name('types');
  Route::get('type/create', [TypeController::class,'create'])->name('type_create');
  Route::post('type/create', [TypeController::class,'store']);
  Route::get('type/edit/{type}', [TypeController::class,'edit'])->name('type_edit');
  Route::post('type/edit/{type}', [TypeController::class,'update']);

  Route::get('familles', [FamilleController::class,'index'])->name('familles');
  Route::get('famille/create', [FamilleController::class,'create'])->name('famille_create');
  Route::post('famille/create', [FamilleController::class,'store']);
  Route::get('famille/edit/{famille}', [FamilleController::class,'edit'])->name('famille_edit');
  Route::post('famille/edit/{famille}', [FamilleController::class,'update']);

});
