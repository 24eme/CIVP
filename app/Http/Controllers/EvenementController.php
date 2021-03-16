<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Type;
use App\Models\Famille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Sabre\VObject;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $evenements = Evenement::all();
      $organismes = Organisme::all();
      $types = Type::all();
      $familles = Famille::all();
        return view('evenement/list',['evenements' => $evenements,'organismes' => $organismes, 'types' => $types, 'familles' => $familles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $organismes = Organisme::all();
      $types = Type::all();
      $familles = Famille::all();
      return view('evenement/create', ['organismes' => $organismes, 'types' => $types, 'familles' => $familles]);
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
            'type_id'=>'required',
            'organisme_id'=>'required',
            'title'=>'required',
            'description'=>'required',
            'start'=>'required|date',
            'end'=>'required|date',
            'textedeloi'=>'',
            'liendeclaration'=>'',
            'active'=>'required|boolean',
            'rrule'=>''
        ]);
        $evenement = Evenement::create($attributes);
        $evenement->saveTags($request->get('tags'));
        $evenement->saveFamilles($request->get('familles'));
        return redirect()->route('evenements');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        $organismes = Organisme::all();
        $types = Type::all();
        $familles = Famille::all();
        return view ('evenement/edit', ['organismes' => $organismes, 'types' => $types, 'evenement' => $evenement, 'familles' => $familles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evenement $evenement)
    {
      $attributes = request()->validate([
          'type_id'=>'required',
          'organisme_id'=>'required',
          'title'=>'required',
          'description'=>'required',
          'start'=>'required|date',
          'end'=>'required|date',
          'textedeloi'=>'',
          'liendeclaration'=>'',
          'active'=>'required|boolean',
          'rrule'=>''
      ]);
      $evenement->update($attributes);
      $evenement->saveTags($request->get('tags'));
      $evenement->saveFamilles($request->get('familles'));
      return redirect()->route('evenements');
    }

    public function popup($id) {
      $evenement = Evenement::find($id);
      return view('components/popup', ['evenement' => $evenement]);
    }

    public function destroy(Evenements $evenements)
    {
        //
    }

    public function exportEvenement($id){

      $evenement = Evenement::find($id);
      $vcalendar = new VObject\Component\VCalendar([
      'VEVENT' => [
          'SUMMARY' => $evenement->title,
          'DTSTART' => new \DateTime($evenement->start),
          'DTEND'   => new \DateTime($evenement->end)
      ]
      ]);
      File::put('event.ics',$vcalendar->serialize());
      return response()->download('event.ics');
    }

    public function export(){

      $evenements = Evenement::all();
      $vcalendar = new VObject\Component\VCalendar();
      foreach ($evenements as $evenement) {
        $vevent = $vcalendar->add('VEVENT', [
            'SUMMARY' => $evenement->title,
            'DTSTART' => new \DateTime($evenement->start),
            'DTEND' => new \DateTime($evenement->end),
        ]);
        $vcalendar->add($vevent);
      }
      File::put('calendar.ics',$vcalendar->serialize());
      return response()->download('calendar.ics');
    }
}
