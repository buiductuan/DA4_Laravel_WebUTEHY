<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class adminAuthController extends Controller
{
    public function getLogin()
    {
    	return view('admin.pages.authentication.index');
    }

    public function postLogin(Request $req)
    {
    	$this->validate($req,
    	[
    		'email'=>'required|max:250|min:3',
    		'password'=>'required|max:32|min:6',
    	],
    	[
    		'email.required'=>'Please enter your email',
    		'email.max'=>'Please enter your email small less 250 character',
    		'email.min'=>'Please enter your email than 3 character',
    		'password.required'=>'Please enter your password',
    		'password.max'=>'Please enter your password small less 32 character',
    		'password.min'=>'Please enter your password than 6 character',
    	]);

    	if(Auth::attempt(['email'=>$req->email,'password'=>$req->password]))
    	{
    		return redirect('admin');
    	}
    	else
    	{
    		return redirect('auth/login')->with('error_login','Email or password is wrong. Please check again !!!');
    	}
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
