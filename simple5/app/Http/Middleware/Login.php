<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Login {
    /**
    * Handle an incoming request.
    *
    * @param \Illuminate\Http\Request $request
    * @param string|null              $redirectToRoute
    *
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */

    public function handle( $request, Closure $next, $redirectToRoute = null ) {
        //  return route( 'login' );
        $guards = empty( $guards ) ? [ null ] : $guards;

        foreach ( $guards as $guard ) {
            if ( Auth::guard( $guard )->check() ) {
                return redirect( RouteServiceProvider::HOME );
            }
        }
        // return redirect( RouteServiceProvider::HOME );
        return $next( $request );
    }
}
