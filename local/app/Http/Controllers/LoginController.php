<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

use crypt;
use Hash;
use MessageBag;
class LoginController extends Controller
{
    public function login()
    {       
    	return view('web.login.index');
    }

    public function postLogin(Request $request)
    {
    	$rules = [
           'email' => 'required|email',
           'password' => 'required|min:0'
       	];

       	$message = [
           'email.required' => 'Email is required',
           'email.email' => 'Email is validate',
           'password.required' => 'Password is required',
           'password.min' => 'Password is validate',
       	];

       	$validator = Validator::make($request->all(), $rules, $message);

       	if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();           
       	}

       	if (Auth::guard('web')->attempt(array('email'=>$request->email, 'password'=>$request->password,'is_admin'=>0,'is_suspend'=>0,'is_active'=>1))) {
            return redirect()->route('business.listing');            
        }else{
        	$errors = new MessageBag(['error' => 'The password or username is not correct']);
          return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function success(Request $request)
    {
        $email = crypt::decrypt($request->email);     
        $user = User::where('email','=',$email)->update(['is_active'=>1]);
        return view()->make('web.active-mail.success');
    }
    function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function adminLogin()
    {     
      return view('web.login.admin');
    }

    public function adminPostLogin(Request $request)
    {
      $rules = [
           'email' => 'required|email',
           'password' => 'required|min:6'
        ];

        $message = [
           'email.required' => 'Email is required',
           'email.email' => 'Email is validate',
           'password.required' => 'Password is required',
           'password.min' => 'Password is validate',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();           
        }

        if (Auth::guard('admin')->attempt(array('email'=>$request->email, 'password'=>$request->password, 'is_admin'=>1))) {
            return redirect()->route('dashboard');
        }else{
          $errors = new MessageBag(['error' => 'The password or username is not correct']);
          return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function register(Request $request)
    {
        $input = $request->all();

        $rules = [
           'email' => 'required|unique:users',           
        ];

        $message = [
           'email.required' => 'Email is required',
           'email.unique' => 'Email is exist'           
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();           
        }
        
        $input['password'] = Hash::make($request->password);
        $input['is_admin'] = 0;
        $input['is_active'] = 1;
        User::create($input);
        if (Auth::guard('web')->attempt(array('email'=>$request->email, 'password'=>$request->password, 'is_admin'=>0,'is_active'=>1,'is_suspend'=>0))) {
            return redirect()->route('business.listing');            
        }else{
          return redirect()->back();
        }     
    }    
}
