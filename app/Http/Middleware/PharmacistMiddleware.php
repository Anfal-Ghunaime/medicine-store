<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PharmacistMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::query()->where('id', auth()->user()->id)->first();
        if($user && $user['is_warehouse']==false){
            return $next($request);
        }
        return \response()->json('you can not access this page because you are not pharmacist');
    }
}
