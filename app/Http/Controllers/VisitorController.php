<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Groupe;
use App\Models\Personne;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(){

        $groupes = Groupe::all();
        $personnes = Personne::all();
        $chefs = Personne::where('unite', 'route')->get();
        $districts = District::all();
        return view('welcome', [
            'chefs' => $chefs,
            'groupes' => $groupes,
            'personnes' => $personnes,
            'districts' => $districts,
        ]);
    }
}
