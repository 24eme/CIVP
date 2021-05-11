<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Type;
use App\Models\Famille;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganismeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familles = Famille::all();
        $organismes = Organisme::all();
        $tags = Tag::all();
        $user = null;
        if (Auth::check()) {
          $user = Auth::user();
        }
        return view('organisme/index', ['tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familles = Famille::all();
        $organismes = Organisme::all();
        $tags = Tag::all();
        $user = null;
        if (Auth::check()) {
          $user = Auth::user();
        }
        return view('organisme/create', ['tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'user' => $user]);
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
            'logo'=>'',
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
        $familles = Famille::all();
        $organismes = Organisme::all();
        $tags = Tag::all();
        $user = null;
        if (Auth::check()) {
          $user = Auth::user();
        }
        return view('organisme/edit', ['organisme' => $organisme, 'tags' => $tags, 'familles' => $familles, 'organismes' => $organismes, 'user' => $user]);
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

      if($request->file('logo')) {
        $attributes['logo'] = 'images/logos/organismes/'.$attributes['logo']->getClientOriginalName();
        $file = request()->file('logo');
        $file->storeAs('logos/organismes',$file->getClientOriginalName(), ['disk' => 'image']);
      }
      $organisme->update($attributes);
      return redirect()->route('organismes');
    }
}
