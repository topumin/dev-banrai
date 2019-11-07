<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/appointment',
        '/report',
        '/bill',
        '/login',
        '/register/user',
        'register/student',
        '/forgotpassword-user',
        '/receive_otp',
        '/newpassword',
        '/forgotpassword/againotp',
        'pass_forgot',
        'tasks/refresh/pf_student',
        '/tasks/refresh/appointment',
        '/tasks/refresh/appointment/student',
        '/tasks/refresh/report',

    ];
}
