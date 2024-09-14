<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSalary
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $salary = $request->input('salary');
        if($salary < 500){
            return response()->json(['message' => 'Salary must be greater than 1000'], 400);
        }
        $response = $next($request);
        $response->headers->set('X-Developer-Name', 'Jefferson Leon');
        return $response;
    }
}
