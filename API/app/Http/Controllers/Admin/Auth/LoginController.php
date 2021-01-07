<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Dreadnought\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\View\View;

class LoginController extends Controller
{
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function showLoginForm(): View
    {
        return view('admin.login');
    }

    /**
     * admin logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/admin');
    }
}
