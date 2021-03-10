<?php

namespace App\Http\Controllers;

use App\Models\Organisme;
use Illuminate\Http\Request;

class OrganismeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $organismes = Organisme::all();
          return view('organisme/list', compact('organismes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organisme/create');
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
            'contact'=>'required',
            'ville'=>'required',
            'telephone'=>'required',
            'email'=>'required|email',
        ]);
        Organisme::create($attributes);
        return redirect()->route('organismes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisme  $organismes
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisme $organisme)
    {
        return view('organisme/edit', compact('organisme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisme  $organisme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisme $organisme)
    {
      $attributes = request()->validate([
          'nom'=>'required',
          'adresse'=>'required',
          'code_postal'=>'required',
          'contact'=>'required',
          'ville'=>'required',
          'telephone'=>'required',
          'email'=>'required|email',
      ]);
      $organisme->update($attributes);
      return redirect()->route('organismes');
    }
}
