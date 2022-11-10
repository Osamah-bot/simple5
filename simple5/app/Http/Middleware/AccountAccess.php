<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class    AccountAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {

        // echo $userType;
        if (auth()->user()->account_type == $userType) {
            //  echo auth()->user()->patients;
            // echo '<br> welcome sinan';
            // echo  auth()->user()->account_type;
             return $next($request);

        }
         return response()->json(['You do not have permission to access for this page.']);// .' '.auth()->user()->account_type;
        /* return response()->view('errors.check-permission'); */
    }
}
