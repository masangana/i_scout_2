<?php

namespace App\Http\Controllers\Groupe;

use App\Http\Controllers\Controller;
use App\Models\Personne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniteController extends Controller
{
    public function meute() {

        $personnes = Personne::where('unite','meute')
                              ->where('groupe_id', Auth::user()->userable_id)
                                ->get();
        $count = count($personnes);
        $unite = 'Meute';
        return view('groupe.meute.index',[

            'personnes' => $personnes,
            'count' => $count,
            'unite' => $unite,
        ]);
    }

    public function troupe() {
            
        $personnes = Personne::where('unite','troupe')
                            ->where('groupe_id', Auth::user()->userable_id)
                                ->get();
        $count = count($personnes);
        $unite = 'Troupe';
        return view('groupe.troupe.index',[

            'personnes' => $personnes,
            'count' => $count,
            'unite' => $unite,
        ]);
    }

    public function compagnie() {
        
        $personnes = Personne::where('unite','compagnie')
                              ->where('groupe_id', Auth::user()->userable_id)
                                ->get();
        $count = count($personnes);
        $unite = 'Compagnie';
        return view('groupe.compagnie.index',[

            'personnes' => $personnes,
            'count' => $count,
            'unite' => $unite,
        ]);
    }

    public function clan() {
            
        $personnes = Personne::where('unite','clan')
                            ->where('groupe_id', Auth::user()->userable_id)
                                ->get();
        $count = count($personnes);
        $unite = 'Clan';
        return view('groupe.clan.index',[

            'personnes' => $personnes,
            'count' => $count,
            'unite' => $unite,
        ]);
    }

    public function route() {

        $personnes = Personne::where('unite','route')
                              ->where('groupe_id', Auth::user()->userable_id)
                                ->get();
        $count = count($personnes);
        $unite = 'Route';
        return view('groupe.route.index',[
            'personnes' => $personnes,
            'count' => $count,
            'unite' => $unite,
        ]);
    }
}
