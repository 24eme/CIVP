<?php

namespace App\Http\Controllers;

use App\Models\Evenements;
use App\Models\Organismes;
use App\Models\Profils;
use Illuminate\Http\Request;

class EvenementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenements::get()->all();
        return view('evenements/index', compact('evenements'));
    }

    public function show(){
      $evenements = Evenements::all();
      return $evenements;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $organismes = Organismes::get()->all();
      $profils = Profils::get()->all();
        return view('evenements/create', ['organismes' => $organismes, 'profils' => $profils]);
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
                'titre'=>'required',
                'description'=>'required',
                'date_debut'=>'required|date',
                'date_fin'=>'required|date',
            ]);
            $evenements = Evenements::create($attributes);
            return redirect()->route('evenements');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenements  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenements $evenement)
    {

        $organismes = Organismes::get()->all();
        $profils = Profils::get()->all();
      return view ('evenements/edit', ['organismes' => $organismes, 'profils' => $profils, 'evenement' => $evenement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evenements  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evenements $evenement)
    {
      $attributes = request()->validate([
              'profil_id'=>'required',
              'organisme_id'=>'required',
              'titre'=>'required',
              'description'=>'required',
              'date_debut'=>'required|date',
              'date_fin'=>'required|date',
          ]);
      $evenement->update($attributes);
      return redirect()->route('evenements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evenements  $evenements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evenements $evenements)
    {
        //
    }
}
