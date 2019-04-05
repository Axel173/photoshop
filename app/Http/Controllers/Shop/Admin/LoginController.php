<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Repositories\ShopUserRepository;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends BaseAdminController
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

    private $shopUserRepository;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->shopUserRepository = app(ShopUserRepository::class);

        /*$this->middleware('guest')->except('logout');*/
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('shop.admin.auth.login');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        Auth::once([
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user = Auth::getUser();

        if ($user and $user->type === 1) {
            Auth::logout();
            return $this->guard()->attempt(
                $this->credentials($request), $request->filled('remember')
            );
        }

        return false;
    }
}
