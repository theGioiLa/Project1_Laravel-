<?php

namespace Store\Http\Controllers\Auth;

use Store\User;
use Mail;
use Store\VerifyUser;
use Store\Mail\VerifyMail;
use Illuminate\Http\Request;
use Store\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:6|confirmed',
        ],
        [
            'email.unique'       => 'email đã tồn tại',
            'password.min'       => 'Mật khẩu tối thiểu :min ký tự',
            'password.confirmed' => 'Mật khẩu không khớp'
        ]
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Store\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $verifyUser = VerifyUser::create([
            'id_user' => $user->id,
            'token' => str_random(40)
        ]);
 
        Mail::to($user->email)->send(new VerifyMail($user));
 
        return $user;
    }

    public function verifyUser($token) 
    {
        $status = "";
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Email của bạn được xác nhận. Bây giờ bạn có thể đăng nhập ";
            } else {
                $status = "Email của bạn đã được xác nhận rồi. Bây giờ bạn có thể login.";
            }
        } else {
            return redirect('/login')->with('warning', "Xin lỗi, email chưa được xác nhận!");
        }
        return redirect('/login')->with('status', $status);
    }

    public function registered(Request $req, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', "Chúng tôi vừa gửi bạn một mã active, vui lòng kiểm tra email đã đăng kí!");
    }
}
