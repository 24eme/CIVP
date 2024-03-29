<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Type;
use App\Models\Famille;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        return view('organisme/index', ['organismes' => $organismes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organisme/create', []);
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
            'adresse'=>'',
            'code_postal'=>'',
            'contact'=>'',
            'ville'=>'',
            'telephone'=>'',
            'email'=>'',
            'couleur'=>'',
            'site'=>'',
            'logo'=>'image',
        ]);

        $attributes['visible_filtre'] = ($request->has('visible_filtre')&&$request->get('visible_filtre'))? 1 : 0;

        if ($request->has('logo')) {
            $n = (Str::of($request->nom)->slug('-'));
            $filename = $request->file('logo')->storeAs('logos/organismes', basename($n).'.'.$request->file('logo')->extension(), 'image');
            $attributes['logo'] = basename($filename);
        }

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
        return view('organisme/edit', ['organisme' => $organisme]);
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
          'adresse'=>'',
          'code_postal'=>'',
          'contact'=>'',
          'ville'=>'',
          'telephone'=>'',
          'email'=>'',
          'couleur'=>'',
          'site'=>'',
          'logo'=>'',
      ]);
      $attributes['visible_filtre'] = ($request->has('visible_filtre')&&$request->get('visible_filtre'))? 1 : 0;
      if($request->file('logo')) {
        $n = Str::of($request->nom)->slug('-');
        $file = $request->file('logo');
        $filename = $file->storeAs('logos/organismes', $n.'.'.$file->extension(), 'image');
        $attributes['logo'] = basename($filename);
      }
      $organisme->update($attributes);
      return redirect()->route('organismes');
    }
}
