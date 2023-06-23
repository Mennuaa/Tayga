<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
<<<<<<< HEAD
     * @var array<int, string>
=======
     * @var array
>>>>>>> aa3445f (projects done)
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
