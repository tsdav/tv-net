<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminLoggedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next): Response|JsonResponse
    {
        if ($request->session()->get('adminLoggedIn', false)) {
            return $next($request);
        }

        return response()->json([
            'status' => false,
            'message' => 'You must be logged in'
        ], 403);
    }
}
