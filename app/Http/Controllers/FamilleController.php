<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Type;
use App\Models\Famille;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familles = Famille::all();
        return view('famille/index', ['familles' => $familles]);
    }

    /**
     * Show the form for creating a new Famille
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('famille/create', []);
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
            'description'=>'',
        ]);

        Famille::create($attributes);
        return redirect()->route('familles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function edit(Famille $famille)
    {
      return view('famille/edit', ['famille' => $famille]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Famille  $famille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Famille $famille)
    {
        $attributes = request()->validate([
            'nom'=>'required',
            'description'=>''
        ]);
        $famille->update($attributes);
        return redirect()->route('familles');
    }
}
