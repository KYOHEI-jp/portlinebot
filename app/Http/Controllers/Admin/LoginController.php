<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
	protected $redirectTo = '/admin/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {

		$this->middleware('guest:admin')->except('logout');
	}
	//ログイン画面
	public function showLoginForm() {
		return view('admin.login');
	}

	public function guard() {
		return Auth::guard('admin'); //管理者認証のguardを指定
	}

	public function logout(Request $request) {
		Auth::guard('admin')->logout();
		$request->session()->regenerate();

		return redirect('/admin/login'); //ログアウト後のリダイレクト先
	}
}
