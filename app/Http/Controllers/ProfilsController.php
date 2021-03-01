<?php

namespace App\Http\Controllers;

use App\Models\Profils;
use Illuminate\Http\Request;

class ProfilsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
           $profils = Profils::get()->all();
           return view('profils/index', compact('profils'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('profils/create');
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
               'couleur'=>'required',
           ]);
           $profils = Profils::create($attributes);
           return redirect()->route('profils');
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Profils  $profil
      * @return \Illuminate\Http\Response
      */
     public function edit(Profils $profil)
     {
         return view('profils/edit', compact('profil'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Profils  $profils
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Profils $profil)
     {
       $attributes = request()->validate([
               'nom'=>'required',
               'couleur'=>'required',
           ]);
       $profil->update($attributes);
       return redirect()->route('profils');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Profils  $profils
      * @return \Illuminate\Http\Response
      */
     public function destroy(Profils $profils)
     {
         //
     }
}
