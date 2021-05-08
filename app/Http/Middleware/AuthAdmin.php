<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->utype === 'ADM')
        {
            session(['utype' => 'ADM']);
        }
        else if (Auth::user()->utype === 'USR')
        {
            session(['utype' => 'USR']);
        }

        if (session('utype') === 'ADM')
        {
            return $next($request);
        }
        session()->flush();
        return redirect()->route('login');
    }
}
