<?php

namespace App\Http\Controllers;

use App\Mail\Credentials;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('user.index');
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        if ($request->get('district')) {
            $userable_type = "App\Models\District";
            $userable_id = $request->get('district');
            $role = 'district';
        } elseif($request->get('groupe')) {
            $userable_type = "App\Models\Groupe";
            $userable_id = $request->get('groupe');
            $role = 'groupe';
        } 
        

        $password = Str::random(10);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($password),
            'userable_id' => $userable_id,
            'userable_type' => $userable_type,
            'role' => $role,

        ]);

        //return $user;
        $user->save();

        Mail::to($user->email)->send(new Credentials($user, $password) );
        
        if ($request->get('district')) {
            return redirect()->route('district_users.index');
        } elseif($request->get('groupe')) {
            return redirect()->route('groupes.show', $request->get('groupe'))->with('success', 'Groupe created successfully.');
        }
        
        
    }

    public function is_active($id) {
        $user = User::find($id);
        $user->is_active = !$user->is_active;
        $user->save();
        if (Auth::user()->userable_type == "App\Models\Province") {
            return redirect()->route('district_users.index');
        } elseif(Auth::user()->userable_type == "App\Models\District") {
            return redirect()->route('groupe_users.index');
        }
        
        
    }
}
