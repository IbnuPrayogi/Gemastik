<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected function redirectTo()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->id_roles == 11) {
                return RouteServiceProvider::ADMIN;
            } elseif ($user->id_roles == 99) {
                return RouteServiceProvider::CLIENT;
            }
        }
        return RouteServiceProvider::HOME;
    }

    public function logout()
{
    Auth::logout();

    return redirect('/'); // Redirect ke halaman yang diinginkan setelah logout
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
