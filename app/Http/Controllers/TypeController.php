<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
           $types = Type::get()->all();
           return view('type/index', compact('types'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('type/create');
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
       Type::create($attributes);
       return redirect()->route('types');
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Type  $type
      * @return \Illuminate\Http\Response
      */
     public function edit(Type $type)
     {
         return view('type/edit', compact('type'));
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
           'nom'=>'required',
           'couleur'=>'required',
       ]);
       $type->update($attributes);
       return redirect()->route('types');
     }
}
