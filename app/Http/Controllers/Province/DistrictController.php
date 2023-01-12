<?php

namespace App\Http\Controllers\Province;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        return view('province.districts.index');
    }

    public function create() {
        return view('province.districts.create');
    }

    public function store(Request $request) {
        return redirect()->route('districts.index');
    }
}
