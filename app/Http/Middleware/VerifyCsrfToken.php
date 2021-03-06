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
        '/tasks/refresh',
        '/tasks/refresh/student',
        'tasks/refresh/pf_student',
        '/tasks/refresh/appointment',
        '/tasks/refresh/appointment/student',
        '/tasks/refresh/report',
        'image/upload/store',
        'image/delete',
        'parent/dashboard/info',
        'admin/management/news/update',
        '/ajax_upload/action',
        'news',
        'admin/management/news/create/new',
        'parent/store',
        'line/notify',
        'admin/management/parent/update',
        'admin/management/parent/store',
        'admin/management/student/update',
        '/admin/management/staff/store',
        '/admin/management/staff/update',
        '/logout'

    ];
}
