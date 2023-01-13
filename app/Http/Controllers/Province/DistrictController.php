<?php

namespace App\Http\Controllers\Province;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DistrictController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $province = Province::with('districts')->where('id', Auth::user()->userable_id)->first();

        //return $province;
        return view('province.district.index',[
            'province' => $province,
        ]);
    }

    public function create() {
        return view('province.district.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $district = new District([
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'description' => $request->get('description'),
            'province_id' => $request->get('province'),
        ]);

        $district->save();
        
        return redirect()->route('districts.index');
    }

    public function show($id) {
        $district = District::find($id);
        return view('province.district.show', [
            'district' => $district,
        ]);
    }

    public function edit($id) {
        $district = District::find($id);
        return view('province.district.edit', [
            'district' => $district,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $district = District::find($id);
        $district->name = $request->get('name');
        $district->code = $request->get('code');
        $district->description = $request->get('description');
        $district->province_id = $request->get('province');
        $district->save();

        return redirect()->route('districts.index');
    }

    public function destroy($id) {
        $district = District::find($id);
        $district->delete();

        return redirect()->route('districts.index');
    }
}
