<?php

namespace App\Http\Controllers\Groupe;

use App\Http\Controllers\Controller;
use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniteController extends Controller
{
    public function meute() {
        return view('groupe.meute.index');
    }

    public function troupe() {
        return view('groupe.troupe.index');
    }

    public function compagnie() {
        return view('groupe.compagnie.index');
    }

    public function clan() {
        return view('groupe.clan.index');
    }

    public function route() {

        $routiers = Personne::where('unite','route')
                              ->where('groupe_id', Auth::user()->userable_id)
                                ->get();
        $count = count($routiers);
        $unite = 'Route';
        return view('groupe.route.index',[
            'routiers' => $routiers,
            'count' => $count,
            'unite' => $unite,
        ]);
    }
}
