<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckUserType;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Request;
use Route;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if(Route::currentRouteName() == 'admin.login')
        {
            $this->middleware(CheckUserType::class);
        } else {
            $this->middleware('guest')->except('logout');
        }
    }

    public function loginn(Request $request)
    {
        dd('test');

    }
}
