<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganismeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AdminController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/evenement/list', [IndexController::class, 'listEvenements'])->name('listEvenements');
Route::get('/filtres/infos', [IndexController::class, 'filtersInfos'])->name('filtersInfos');
Route::get('/evenement/{id}', [EvenementController::class,'popup'])->name('evenement_popup');
Route::get('/evenement/export/{id}', [EvenementController::class,'exportEvenement'])->name('export');
Route::get('/export', [IndexController::class,'export'])->name('export');
Route::get('/mentions-legales', [IndexController::class,'mentions'])->name('mentions');
Route::get('/reinit-filtres', [IndexController::class,'reinitFilters'])->name('reinit');

Route::get('/admin', [AdminController::class,'login'])->name('login');
Route::post('/admin/authenticate', [AdminController::class,'authenticate'])->name('authenticate');
Route::get('/admin/authenticated', [AdminController::class,'authenticated'])->name('authenticated');

Route::prefix('admin')->middleware('auth')->group(function () {
  Route::get('/logout', [AdminController::class,'logout'])->name('logout');

  Route::get('evenement/create', [EvenementController::class,'create'])->name('evenement_create');
  Route::post('evenement/create', [EvenementController::class,'store']);
  Route::get('evenement/edit/{evenement}', [EvenementController::class,'edit'])->name('evenement_edit');
  Route::post('evenement/edit/{evenement}', [EvenementController::class,'update']);
  Route::get('evenement/delete/{evenement}', [EvenementController::class,'delete'])->name('evenement_delete');

  Route::get('organismes', [OrganismeController::class,'index'])->name('organismes');
  Route::get('organisme/create', [OrganismeController::class,'create'])->name('organisme_create');
  Route::post('organisme/create', [OrganismeController::class,'store']);
  Route::get('organisme/edit/{organisme}', [OrganismeController::class,'edit'])->name('organisme_edit');
  Route::post('organisme/edit/{organisme}', [OrganismeController::class,'update']);

  Route::get('types', [TypeController::class,'index'])->name('types');
  Route::get('type/edit/{type}', [TypeController::class,'edit'])->name('type_edit');
  Route::post('type/edit/{type}', [TypeController::class,'update']);

  Route::get('familles', [FamilleController::class,'index'])->name('familles');
  Route::get('famille/create', [FamilleController::class, 'create'])->name('famille_create');
  Route::post('famille/create', [FamilleController::class, 'store']);
  Route::get('famille/edit/{famille}', [FamilleController::class,'edit'])->name('famille_edit');
  Route::post('famille/edit/{famille}', [FamilleController::class,'update']);

  Route::post('/importCSV', [CalendarController::class,'importCSV'])->name('importCSV');

});
