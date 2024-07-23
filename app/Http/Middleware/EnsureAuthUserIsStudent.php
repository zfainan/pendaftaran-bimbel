<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAuthUserIsStudent
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (! ($user->userable instanceof Student)) {
            abort(403);
        }

        if (
            (! $user->userable->tgl_lahir) &&
            'student.complete-registration' != $request->route()->getName() &&
            'student.store-registration' != $request->route()->getName()
        ) {
            return redirect()->route('student.complete-registration');
        } elseif (
            'student.complete-registration' == $request->route()->getName() ||
            'student.store-registration' == $request->route()->getName()
        ) {
            return redirect()->route('student.home');
        }

        return $next($request);
    }
}
