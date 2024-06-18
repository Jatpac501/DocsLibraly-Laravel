<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckTeam
{
    public function handle(Request $request, Closure $next, int $teamId): Response
    {
        if (Auth::check() && Auth::user()->currentTeam->id == $teamId) {
            return $next($request);
        }
        return back();
    }
}
