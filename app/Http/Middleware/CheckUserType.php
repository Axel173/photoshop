<?php

namespace App\Http\Middleware;

use Closure;
use Route;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $cur_route = Route::currentRouteName();

        if ($request->user() and $request->user()->type) //если юзересть и он админ
        {
            if ($cur_route == 'shop.admin.login') //если на форме входа
            {
                return redirect()
                    ->route('shop.admin'); //редиректим в админку
            }

        } else { //если неавторизован
            if ($cur_route !== 'shop.admin.login' AND $request->method() !== 'POST') //если не форма входа
            {
                return redirect()
                    ->route('shop.admin.login'); //редиректим на форму входа
            }
        }
        return $next($request);
    }
}
