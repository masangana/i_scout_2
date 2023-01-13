<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupeUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
    public function index() {
        return view('district.groupe_user.index');
    }

    public function create() {
        return view('district.groupe_user.create');
    }
}
