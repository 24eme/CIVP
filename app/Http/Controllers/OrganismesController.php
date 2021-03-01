<?php

namespace App\Http\Controllers;

use App\Models\Organismes;
use Illuminate\Http\Request;

class OrganismesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $organismes = Organismes::get()->all();
          return view('organismes/index', compact('organismes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organismes/create');
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
              'nom'=>'required',
              'adresse'=>'required',
              'code_postal'=>'required',
              'ville'=>'required',
              'telephone'=>'required',
              'email'=>'required|email',
          ]);
          $organismes = Organismes::create($attributes);
          return redirect()->route('organismes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organismes  $organismes
     * @return \Illuminate\Http\Response
     */
    public function edit(Organismes $organisme)
    {
        return view('organismes/edit', compact('organisme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organismes  $organismes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organismes $organisme)
    {
      $attributes = request()->validate([
              'nom'=>'required',
              'adresse'=>'required',
              'code_postal'=>'required',
              'ville'=>'required',
              'telephone'=>'required',
              'email'=>'required|email',
          ]);
      $organisme->update($attributes);
      return redirect()->route('organismes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organismes  $organismes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organismes $organismes)
    {
        //
    }
}
