<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $roles = [
            'admin' => [2],
            'worker' => [1, 2],
            'client' => [0, 1, 2]
        ];

        $roleIds = $roles[$role] ?? [];

        if (!in_array(auth()->user()->role_id, $roleIds)) {
            abort(403);
        }


        return $next($request);
    }
}
