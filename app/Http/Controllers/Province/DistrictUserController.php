<?php

namespace App\Http\Controllers\Province;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $districts = District::with('users') 
                                ->where('province_id', Auth::user()
                                ->userable_id)->get();
        $groupes = '';

        //return $districts;

        return view('province.user.index',[
            'districts' => $districts,
            'groupes' => $groupes,
        ]);
    }

    public function create() {
        $districts = District::where('province_id', Auth::user()->userable_id)->get();
        $groupes = '';
        return view('province.user.add',
        [
            'districts' => $districts,
            'groupes' => $groupes,
        ]);
    }
}
