<?php

namespace App\Http\Middleware;

use App\Models\Type_User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Dashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {

        $auth=false;
        foreach ($roles as $role){
            if (Type_User::where( "id",auth()->user()->type_id)->pluck("type")[0]==$role){
                $auth=true;
            }}
        if($auth==false){
            toastr()->warning("you are not allowed to visit this link");
            return redirect()->route("dashboard") ;
        }


        return $next($request);
    }
}
