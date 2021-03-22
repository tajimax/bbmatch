<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // ゲストユーザー用のユーザーIDを定数として定義
    private const GUEST_USER_ID_01 = 6;
    private const GUEST_USER_ID_02 = 7;

    // ゲストログイン処理
     public function guestLogin_01()
    {
        // id=1 のゲストユーザー情報がDBに存在すれば、ゲストログインする
        if (Auth::loginUsingId(self::GUEST_USER_ID_01)) {
            return redirect('/showSearchRecruit');
        }

        return redirect('/showSearchRecruit');
    }

    // ゲストログイン処理
     public function guestLogin_02()
    {
        // id=2 のゲストユーザー情報がDBに存在すれば、ゲストログインする
        if (Auth::loginUsingId(self::GUEST_USER_ID_02)) {
            return redirect('/showSearchRecruit');
        }

        return redirect('/showSearchRecruit');
    }
}
