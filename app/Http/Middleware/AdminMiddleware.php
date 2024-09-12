<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $username = Config::get('admin.username');
        $password = Config::get('admin.password');

        if ($request->header('Username') === $username && $request->header('Password') === $password) {
            return $next($request);
        }

        return redirect('/');
    }
}
