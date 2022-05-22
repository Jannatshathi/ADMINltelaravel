<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class TeacherAuthenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('teacher.login');
        }
    }
     protected function authenticate($request, array $guards)
    {
            if ($this->auth->guard('teacher')->check()) {
                return $this->auth->shouldUse('teacher');
            }
           $this->unauthenticated($request, ['teacher']);
    }
}
