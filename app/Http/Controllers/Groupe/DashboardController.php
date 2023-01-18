<?php

namespace App\Http\Controllers\Groupe;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use App\Models\Personne;
use Carbon\Carbon;
use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
    public function index() {

      $clan = Personne::where('groupe_id', Auth::user()->userable_id)
      ->where('unite', 'clan')->get();

      $compagnie = Personne::where('groupe_id', Auth::user()->userable_id)
      ->where('unite', 'compagnie')->get();

      $troupe = Personne::where('groupe_id', Auth::user()->userable_id)
      ->where('unite', 'troupe')->get();

      $meute = Personne::where('groupe_id', Auth::user()->userable_id)
      ->where('unite', 'meute')->get();

      $route = Personne::where('groupe_id', Auth::user()->userable_id)
      ->where('unite', 'route')->get();

      $userLogs = LogActivity::latest()->
                      where('user_id', Auth::user()->id)
                      ->take(10)
                      ->orderBy('created_at', 'desc')
                      ->get();

      $janvier = Personne::RecordsByMonth("01", Auth::user()->userable_id)->get();
      $fevrier = Personne::RecordsByMonth("02", Auth::user()->userable_id)->get();
      $mars = Personne::RecordsByMonth("03", Auth::user()->userable_id)->get();
      $avril = Personne::RecordsByMonth("04", Auth::user()->userable_id)->get();
      $mai = Personne::RecordsByMonth("05", Auth::user()->userable_id)->get();
      $juin = Personne::RecordsByMonth("06", Auth::user()->userable_id)->get();
      $juillet = Personne::RecordsByMonth("07", Auth::user()->userable_id)->get();
      $aout = Personne::RecordsByMonth("08", Auth::user()->userable_id)->get();
      $septembre = Personne::RecordsByMonth("09", Auth::user()->userable_id)->get();
      $octobre = Personne::RecordsByMonth("10", Auth::user()->userable_id)->get();
      $novembre = Personne::RecordsByMonth("11", Auth::user()->userable_id)->get();
      $decembre = Personne::RecordsByMonth("12", Auth::user()->userable_id)->get();
 
      return view('groupe.dashboard', [
        'clan' => $clan,
        'compagnie' => $compagnie,
        'troupe' => $troupe,
        'meute' => $meute,
        'route' => $route,
        'userLogs' => $userLogs,
        'janvier' => $janvier,
        'fevrier' => $fevrier,
        'mars' => $mars,
        'avril' => $avril,
        'mai' => $mai,
        'juin' => $juin,
        'juillet' => $juillet,
        'aout' => $aout,
        'septembre' => $septembre,
        'octobre' => $octobre,
        'novembre' => $novembre,
        'decembre' => $decembre,
      ]);
    }

}
