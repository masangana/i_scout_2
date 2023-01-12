<?php

namespace App\Http\Controllers\Province;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $districts = District::where('province_id', Auth::user()->userable_id)->get();

        //$districts = null;
        $groupes = '';

       // return $districts;

        return view('province.user.add',[
            'districts' => $districts,
            'groupes' => $groupes,
        ]);
    }
}
