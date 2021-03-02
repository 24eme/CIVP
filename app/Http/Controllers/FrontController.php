<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Evenement;

class FrontController extends Controller
{
    public function index()
    {
      $evenements = Evenement::get()->all();
      return view('index', ['evenements' => $evenements]);
    }

}
