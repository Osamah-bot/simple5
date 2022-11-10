<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct() {
        $this->middleware( 'guest' )->except( 'logout' );

    }

    public function login( Request $request ) {
        $input = $request->all();
        $this->validate( $request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ] );

        if ( auth()->attempt( array( 'email' => $input[ 'email' ], 'password' => $input[ 'password' ] ) ) ) {
            if ( auth()->user()->account_type == 'Admin' ) {
                return redirect()->route( 'admin.dash' );
            } else if ( auth()->user()->account_type == 'Patient' ) {
                return redirect()->route( 'patient.home' );
            } else if ( auth()->user()->account_type == 'Doctor' ) {
                // echo 'welocme ';
                // echo auth()->user()->account_type;
                return redirect()->route( 'doctor.appoi_list' );
                // return redirect()->route( 'manager.home', '4' );
            } else if (auth()->user()->account_type == 'Accountant') {
                // echo 'welocme ';
                // echo auth()->user()->account_type;
                return redirect()->route('accountant.dash');
                // return redirect()->route('manager.home','4');
            }
            else {
                return redirect()->route( 'login' )->with( 'error', 'Email-Address And Password Are Wrong.' );
            }
        } else {
            return redirect()->back()->withErrors('Email-Address Or Password Are Wrong.');
        }

    }
}
