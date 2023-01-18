<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictGroupeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
    public function index() {
        $district = District::with('groupes') 
                        ->where('id', Auth::user()->userable_id)->first();

        return view('district.groupe.index',
        [
            'district' => $district,
        ]);
    }

    public function create() {
        $district = District::where('id', Auth::user()->userable_id)->first();
        //return $district;

        return view('district.groupe.create', [
            'district' => $district,
        ]);
    }

    public function store(Request $request) {
        
        $request->validate([
            'name' => 'required',
            'affiliate' => 'required',
        ]);

        //return $request->all();
        $district = District::where('id',$request->get('district'))->first();
        $groupe = new Groupe([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'description' => $request->get('description'),
            'affiliate' => $request->get('affiliate'),
            'district_id' => $request->get('district'),
            'province_id' => $district->province_id,
            'creation_date' => $request->get('creation_date'),
            'adresse' => $request->get('adresse'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'couleur_1' => $request->get('couleur_1'),
            'couleur_2' => $request->get('couleur_2'),
            'couleur_3' => $request->get('couleur_3'),
        ]);
        
        $groupe->save();

        return redirect()->route('groupes.show', $groupe->id)->with('success', 'Groupe created successfully.');
    }

    public function show($id) {
        $groupes = Groupe::with('users', 'personnes')->findorfail($id);
        $personnes = $groupes->personnes ;

        //return $personnes ;

        $districts = '';
        return view('district.groupe.show', 
            [
                'groupes' => $groupes,
                'personnes' => $personnes,
                'districts' => $districts,
            ]
        );
    }
}
