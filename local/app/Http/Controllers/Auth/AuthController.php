<?php

namespace App\Http\Controllers\Auth;

use App\Models\Customer;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\UserRepository;
use App\Jobs\SendMail;

use App\Models\UserLog;

class AuthController extends Controller
{

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLoginFront() {
		return view('auth.login-front');
	}
	/**
	 * Handle a login request to the application.
	 *
	 * @param  App\Http\Requests\LoginRequest  $request
	 * @param  Guard  $auth
	 * @return Response
	 */
	public function postLogin(
		LoginRequest $request,
		Guard $auth)
	{
		$logValue = $request->input('log');

		$logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $throttles = in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
			return redirect('/administrator')
				->with('error', trans('front/login.maxattempt'))
				->withInput($request->only('log'));
        }

		$credentials = [
			$logAccess  => $logValue, 
			'password'  => $request->input('password')
		];

		if(!$auth->validate($credentials)) {
			if ($throttles) {
	            $this->incrementLoginAttempts($request);
	        }

			return redirect('/administrator')
				->with('error', trans('front/login.credentials'))
				->withInput($request->only('log'));
		}
			
		$user = $auth->getLastAttempted();

        if ($user->isRole == 'administrator') {
            if ($throttles) {
                $this->clearLoginAttempts($request);
            }
            $auth->login($user);

            return redirect('/admin');

            $request->session()->put('user_id', $user->id);
        } else {

            return redirect('/administrator')
                ->with('error', trans('front/login.credentials'))
                ->withInput($request->only('log'));
        }

		return redirect('/administrator')->with('error', trans('front/verify.again'));			
	}

	public function postLoginFront(
		LoginRequest $request,
		Guard $auth)
	{
		$logValue = $request->input('log');

		$logAccess = filter_var($logValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

		$throttles = in_array(
			ThrottlesLogins::class, class_uses_recursive(get_class($this))
		);

		if ($throttles && $this->hasTooManyLoginAttempts($request)) {
			return redirect('/auth/login')
				->with('error', trans('front/login.maxattempt'))
				->withInput($request->only('log'));
		}

		$credentials = [
			$logAccess  => $logValue,
			'password'  => $request->input('password')
		];


		// check user status and return
		if ($logAccess == 'phone') {
			$data = \DB::table('customers')->where('phone', $logValue)->first();
			if (count ($data)) {
				if($data->status == '0') {
					return redirect('/auth/login')
						->with('error', 'Tài khoản của bạn sai thông tin hoặc đang bị khóa')
						->withInput($request->only('log'));
				}
			}
		}

		if ($logAccess == 'email') {
			$data = \DB::table('customers')->where('email', $logValue)->first();
			if (count ($data)) {
				if ($data->status == '0') {
					return redirect('/auth/login')
						->with('error', 'Tài khoản của bạn sai thông tin hoặc đang bị khóa')
						->withInput($request->only('log'));
				}
			}
		}


		if(!$auth->validate($credentials)) {
			if ($throttles) {
				$this->incrementLoginAttempts($request);
			}

			return redirect('/auth/login')
				->with('error', trans('front/login.credentials'))
				->withInput($request->only('log'));
		}


		$user = $auth->getLastAttempted();

		if ($throttles) {
			$this->clearLoginAttempts($request);
		}
		$auth->login($user);

		// save log user login

		$userLog = new UserLog();
		$userLog->user_id = $user->id;
		$userLog->save();

		return redirect('/mind-before');


		$request->session()->put('user_id', $user->id);

		return redirect('/auth/login')->with('error', trans('front/verify.again'));
	}


	/**
	 * Handle a registration request for the application.
	 *
	 * @param  App\Http\Requests\RegisterRequest  $request
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @return Response
	 */
	public function postRegister(
		RegisterRequest $request,
		UserRepository $user_gestion)
	{
		$user = $user_gestion->store(
			$request->all(), 
			$confirmation_code = str_random(30)
		);

		$this->dispatch(new SendMail($user));

		return redirect('/')->with('ok', trans('front/verify.message'));
	}

	/**
	 * Handle a confirmation request.
	 *
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @param  string  $confirmation_code
	 * @return Response
	 */
	public function getConfirm(
		UserRepository $user_gestion,
		$confirmation_code)
	{
		$user = $user_gestion->confirm($confirmation_code);

        return redirect('/')->with('ok', trans('front/verify.success'));
	}

	/**
	 * Handle a resend request.
	 *
	 * @param  App\Repositories\UserRepository $user_gestion
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function getResend(
		UserRepository $user_gestion,
		Request $request)
	{
		if($request->session()->has('user_id'))	{
			$user = $user_gestion->getById($request->session()->get('user_id'));

			$this->dispatch(new SendMail($user));

			return redirect('/')->with('ok', trans('front/verify.resend'));
		}

		return redirect('/');        
	}
	
}
