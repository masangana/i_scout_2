<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use App\Models\Groupe;
use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {

        $clan = Personne::where('district_id', Auth::user()->userable_id)
                ->where('unite', 'clan')->get();
        $route = Personne::where('district_id', Auth::user()->userable_id)
                ->where('unite', 'route')->get();
        $troupe = Personne::where('district_id', Auth::user()->userable_id)
                ->where('unite', 'troupe')->get();
        $meute = Personne::where('district_id', Auth::user()->userable_id)
                ->where('unite', 'meute')->get();
        $compagnie = Personne::where('district_id', Auth::user()->userable_id)
                ->where('unite', 'compagnie')->get();
        
        $groupes = Groupe::where('district_id', Auth::user()->userable_id);
        
        return view('district.dashboard', [
            'clan' => $clan,
            'route' => $route,
            'troupe' => $troupe,
            'meute' => $meute,
            'compagnie' => $compagnie,
        ]);
      }
}
