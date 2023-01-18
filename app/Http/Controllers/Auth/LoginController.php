<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo() {
        $role = Auth::user()->role; 
        \LogActivity::addToLog("Connexion " .Auth::user()->id);
        switch ($role) {
          case 'province':
            return '/province_dashboard';
            break;
          case 'district':
            return '/district_dashboard';
            break;
          case 'groupe':
            return '/groupe_dashboard';
            break;
      
          default:
            return '/home'; 
          break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \LogActivity::addToLog("Deconnexion ");
        $this->middleware('guest')->except('logout');
    }
}
