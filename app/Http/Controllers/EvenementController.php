<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Type;
use App\Models\Famille;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Sabre\VObject;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{

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
      $types = Type::all();
      $user = null;
      if (Auth::check()) {
        $user = Auth::user();
      }
      return view('evenement/create', ['tags' => $tags, 'familles' => $familles, 'types' => $types, 'organismes' => $organismes, 'user' => $user]);
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
            'title'=>'required',
            'description'=>'required',
            'start'=>'',
            'end'=>'',
            'textedeloi'=>'',
            'liendeclaration'=>'',
            'rrule'=>''
        ]);
        $attributes['active'] = ($request->has('active')&&$request->get('active'))? 1 : 0;
        $evenement = Evenement::create($attributes);
        $evenement->saveTags($request->get('tags'));
        $evenement->saveFamilles($request->get('familles'));
        $evenement->saveOrganismes($request->get('organismes'));
        return redirect(route('index') . '#nav-liste');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
      $familles = Famille::all();
      $organismes = Organisme::all();
      $tags = Tag::all();
      $types = Type::all();
      $user = null;
      if (Auth::check()) {
        $user = Auth::user();
      }
      return view('evenement/edit', ['evenement' => $evenement, 'tags' => $tags, 'familles' => $familles, 'types' => $types, 'organismes' => $organismes, 'user' => $user]);
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
          'title'=>'required',
          'description'=>'required',
          'start'=>'',
          'end'=>'',
          'textedeloi'=>'',
          'liendeclaration'=>'',
          'rrule'=>''
      ]);

      $attributes['active'] = ($request->has('active')&&$request->get('active'))? 1 : 0;
      $evenement->update($attributes);
      $evenement->saveTags($request->get('tags'));
      $evenement->saveFamilles($request->get('familles'));
      $evenement->saveOrganismes($request->get('organismes'));
      return redirect(route('index') . '#nav-liste');
    }

    public function popup($id, $organisme_id) {
      $evenement = Evenement::find($id);
      return view('partials/popup', ['evenement' => $evenement, 'organisme_id' => $organisme_id]);
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
