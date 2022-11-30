<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $user = Auth::user();
        if ($user->is_admin === false) {
            abort(404);
        } elseif ($user->is_admin === null ) {
            abort(200);
        }
        return $next($request);
    }
}
