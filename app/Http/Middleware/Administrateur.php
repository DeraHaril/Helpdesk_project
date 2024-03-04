<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Administrateur
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
        $session_id = session('id');
        $intervenant = DB::select("SELECT * from intervenant where id_intervenant = '$session_id'");
        $nbIntervenant = count($intervenant);
        if($nbIntervenant==1){
            return $next($request);
        }
        else{
            return response()->view('accès_interdit_client');
        }
    }
}
