<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupeUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
    public function index() {
        $groupes = Groupe::with('users') 
                        ->where('district_id', Auth::user()->userable_id)->get();
        
        return view('district.user.index',[
            'groupes' => $groupes,
        ]
        );
    }

    public function create() {
        return view('district.groupe_user.create');
    }
}
