<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSuperuser
{
  /**
   * Handle an incoming request.
   *
   * @param Closure(Request): (Response) $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (!auth()->check() || !auth()->user()->role_id == 1) return redirect()->route('home');
    return $next($request);
  }
}
