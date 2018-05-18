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
//        'posts', // 포스트맨 테스트를 위해 CSRF 보호기능을 잠시 껐다.
//        'posts/*'
//        // 페이지가 만기되었다고 뜨는게 사라지고 store 메소드 작동
    ];
}

