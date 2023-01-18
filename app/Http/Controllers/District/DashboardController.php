<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use App\Models\Groupe;
use App\Models\Personne;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $userLogs = LogActivity::latest()->
                  where('user_id', Auth::user()->id)
                  ->take(10)
                  ->orderBy('created_at', 'desc')
                  ->get();

        for ($i=1; $i < 13; $i++) { 
            $month = Personne::RecordsByMonth($i, Auth::user()->userable_id)->get();
            $months[] = $month->count();

            $meuteMonth = Personne::RecordsByUniteByMonth($i, Auth::user()->userable_id, 'meute');
                $meuteMonths[] = $meuteMonth->count();
        }
        //return $meuteMonth;
        return view('district.dashboard', [
            'clan' => $clan,
            'route' => $route,
            'troupe' => $troupe,
            'meute' => $meute,
            'compagnie' => $compagnie,
            'groupes' => $groupes,
            'userLogs' => $userLogs,
            'months' => $months,
        ]);
      }
}
