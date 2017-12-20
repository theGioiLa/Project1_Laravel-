<?php

namespace Store\Http\Controllers\Auth;

use Mail;
use Store\Mail\VerifyMail;
use Illuminate\Http\Request;
use Store\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/trangchu';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user) 
    {
        if (!$user->verified) {
            auth()->logout();
            Mail::to($user->email)->send(new VerifyMail($user));
            return back()->with('warning', "Bạn cần xác nhận tài khoản. Chúng tôi vừa gửi cho bạn một mã active, vui lòng kiểm tra email đã đăng kí.");
        }
        return redirect()->intended($this->redirectPath());
    }
}
