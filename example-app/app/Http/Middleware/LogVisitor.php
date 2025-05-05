<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admin/*')) {
            return $next($request);
        }

        Visit::create([
            'visited_at' => now(),
            'page' => $request->fullUrl(),
            'ip' => $request->ip(),
            'host' => gethostbyaddr($request->ip()) ?? '',
            'user_agent' => $request->userAgent(),
        ]);

        return $next($request);
    }
}
