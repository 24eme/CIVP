<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Profil;
use App\Models\Famille;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenement::get()->all();
        return view('evenement/index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $organismes = Organisme::get()->all();
      $profils = Profil::get()->all();
      $familles = Famille::get()->all();
      return view('evenement/create', ['organismes' => $organismes, 'profils' => $profils, 'familles' => $familles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'profil_id'=>'required',
            'organisme_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'start'=>'required|date',
            'end'=>'required|date',
            'textedeloi'=>'',
            'liendeclaration'=>'',
            'rrule'=>''
        ]);
        $evenement = Evenement::create($attributes);
        $evenement->saveTags($request->get('tags'));
        $evenement->saveFamilles($request->get('familles'));
        return redirect()->route('evenements');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        $organismes = Organisme::get()->all();
        $profils = Profil::get()->all();
        $familles = Famille::get()->all();
        return view ('evenement/edit', ['organismes' => $organismes, 'profils' => $profils, 'evenement' => $evenement, 'familles' => $familles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evenement $evenement)
    {
      $attributes = request()->validate([
          'profil_id'=>'required',
          'organisme_id'=>'required',
          'title'=>'required',
          'description'=>'required',
          'start'=>'required|date',
          'end'=>'required|date',
          'textedeloi'=>'',
          'liendeclaration'=>'',
          'rrule'=>''
      ]);
      $evenement->update($attributes);
      $evenement->saveTags($request->get('tags'));
      $evenement->saveFamilles($request->get('familles'));
      return redirect()->route('evenements');
    }

    public function popup($id) {
      $evenement = Evenement::find($id);
      return view('evenement/popup', ['evenement' => $evenement]);
    }

}
