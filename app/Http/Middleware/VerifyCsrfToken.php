<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
		'webbhook/incoming',
		'/webbhook/incoming',
		'/webbhook/incoming/*',
		'https://sodabaz.com/MasterMotor/public/webbhook/incoming',
		'webbhook/',
		'/webbhook',
		'/webbhook/*',
		'https://sodabaz.com/MasterMotor/public/webhook/*',

    ];
}
