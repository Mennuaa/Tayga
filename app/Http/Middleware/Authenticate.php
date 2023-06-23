<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> aa3445f (projects done)

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
<<<<<<< HEAD
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
=======
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
>>>>>>> aa3445f (projects done)
    }
}
