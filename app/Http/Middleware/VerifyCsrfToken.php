<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
<<<<<<< HEAD
        '/showStudent', '/viewClassSchedule','/loginUser','/provideAttendance'
=======
        '/showStudent', '/viewClassSchedule', '/viewClassResult'
>>>>>>> d83f4e2b6ab70827c9518d0dc1531bdaab9fa371
    ];
}
