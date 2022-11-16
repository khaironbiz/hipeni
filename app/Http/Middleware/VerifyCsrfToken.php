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
        'transaksi/payment/callback',
        'http://127.0.0.1:8000/transaksi/payment/callback',
        'http://127.0.0.1:8000/api/users',
        'http://127.0.0.1:8000/transaksi/payment/status/*',
        'https://ovon.my.id/transaksi/payment/callback/request/*'
    ];
}
