<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
           $profils = Profil::get()->all();
           return view('profil/index', compact('profils'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('profil/create');
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
       Profil::create($attributes);
       return redirect()->route('profils');
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Profil  $profil
      * @return \Illuminate\Http\Response
      */
     public function edit(Profil $profil)
     {
         return view('profil/edit', compact('profil'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Profil  $profil
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Profil $profil)
     {
       $attributes = request()->validate([
           'nom'=>'required',
           'couleur'=>'required',
       ]);
       $profil->update($attributes);
       return redirect()->route('profils');
     }
}
