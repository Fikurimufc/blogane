<?php

namespace blogane\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use blogane\Http\Requests\SessionRequest;

class SessionsController extends Controller
{
    public function login(){
    	if ($user = Sentinel::check())
    	{
    		Session::flash("notice" , "login". $user->email);
    		return redirect()->back();
    	}else{
    		return view('page.vw_login');
    	}
    }//close function

    public function login_store(SessionRequest $request){
    	if ($user = Sentinel::authenticate($request->all())){
    		Session::flash("notice","welcome".$user->email);
    		return redirect()->intended('/');
    	}else{
    		Session::flash("notice", "Login fails");
    		return view('page.vw_login');
    	}
    }

    public function logout(){
    	Sentinel::logout();
    	Session::flash("notice", "logout success");
    	return redirect('/');
    }

}
