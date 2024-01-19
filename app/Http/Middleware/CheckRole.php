<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::guard('web')->user();

        if (!$user) {
            $student = Auth::guard('student')->user();

            if (!$student) {
                // Usuário não autenticado
                return redirect('/');
            }

            foreach ($roles as $role) {
                if ($role === 'student') {
                    return $next($request);
                }
            }
        } else {
            foreach ($roles as $role) {
                if ($user->role === $role) {
                    return $next($request);
                }
            }
        }

        return redirect('/home')->with('error', 'Acesso não autorizado.');
    }
}
