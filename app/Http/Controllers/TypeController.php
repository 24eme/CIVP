<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Type;
use App\Models\Famille;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
           $types = Type::all();
           $familles = Famille::all();
           $organismes = Organisme::all();
           $tags = Tag::all();
           $user = null;
           if (Auth::check()) {
             $user = Auth::user();
           }
           return view('type/index', ['types' => $types, 'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'user' => $user]);
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Type  $type
      * @return \Illuminate\Http\Response
      */
     public function edit(Type $type)
     {
         $familles = Famille::all();
         $organismes = Organisme::all();
         $tags = Tag::all();
         $user = null;
         if (Auth::check()) {
           $user = Auth::user();
         }
         return view('type/edit', ['type' => $type, 'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'user' => $user]);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Type  $type
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Type $type)
     {
       $attributes = request()->validate([
           'nom'=>'required'
       ]);
       $type->update($attributes);
       return redirect()->route('types');
     }
}
