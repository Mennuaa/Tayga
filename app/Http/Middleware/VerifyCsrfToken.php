<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
<<<<<<< HEAD
     * @var array<int, string>
=======
     * @var array
>>>>>>> aa3445f (projects done)
     */
    protected $except = [
        //
    ];
}
