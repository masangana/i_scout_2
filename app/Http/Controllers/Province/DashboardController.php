<?php

namespace App\Http\Controllers\Province;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Groupe;
use App\Models\LogActivity;
use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function index() {

        $clan = Personne::where('province_id', Auth::user()->userable_id)->where('unite', 'clan')->get();
        $route = Personne::where('province_id', Auth::user()->userable_id)->where('unite', 'route')->get();
        $troupe = Personne::where('province_id', Auth::user()->userable_id)->where('unite', 'troupe')->get();
        $meute = Personne::where('province_id', Auth::user()->userable_id)->where('unite', 'meute')->get();
        $compagnie = Personne::where('province_id', Auth::user()->userable_id)->where('unite', 'compagnie')->get();
        $groupes = Groupe::where('province_id', Auth::user()->userable_id);
        $districts = District::where('province_id', Auth::user()->userable_id);

        $userLogs = LogActivity::latest()->
                  where('user_id', Auth::user()->id)
                  ->take(10)
                  ->orderBy('created_at', 'desc')
                  ->get();

        //return $clan;
        for ($i=1; $i < 13; $i++) { 
            $month = Personne::RecordsByMonth($i, Auth::user()->userable_id)->get();
            $months[] = $month->count();

            $meuteMonth = Personne::RecordsByUniteByMonth($i, Auth::user()->userable_id, 'meute');
                $meuteMonths[] = $meuteMonth->count();
        }
        return view('province.dashboard', [
            'clan' => $clan,
            'route' => $route,
            'troupe' => $troupe,
            'meute' => $meute,
            'compagnie' => $compagnie,
            'groupes' => $groupes,
            'userLogs' => $userLogs,
            'districts' => $districts,
            'months' => $months,
        ]);
      }
}
