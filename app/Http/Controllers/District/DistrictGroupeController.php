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
        //return $district;

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
        ]);

        $groupe = new Groupe([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'description' => $request->get('description'),
            'district_id' => $request->get('district'),
        ]);
        
        $groupe->save();

        return redirect()->route('groupes.show', $groupe->id)->with('success', 'Groupe created successfully.');
    }

    public function show($id) {
        $groupes = Groupe::with('users')->findorfail($id);

        $districts = '';
        return view('district.groupe.show', 
            [
                'groupes' => $groupes,
                'districts' => $districts,
            ]
        );
    }
}
