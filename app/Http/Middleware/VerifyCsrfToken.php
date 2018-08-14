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
        
=======

        '/showStudent', '/viewClassSchedule','/loginUser','/provideAttendance', '/viewClassResult','/viewStudentMarks','/deleteToken','/addAttendance'
>>>>>>> bef34bab95266233d4c78668cc80eaae6cf43d04
    ];
}
