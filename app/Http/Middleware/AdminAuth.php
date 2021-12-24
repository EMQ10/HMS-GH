<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;    
use Illuminate\Support\Facades\Session;

class AdminAuth
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
        $roleID = session()->get('roleID') ?? null ;

       if( $roleID !== null && $roleID != Role::IS_ADMIN ){
        //    abort(403);
            $message = 'Access denied, attempted to visit an unauthorized page'; 
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('message', $message);
        }
        return $next($request);
    }
}
