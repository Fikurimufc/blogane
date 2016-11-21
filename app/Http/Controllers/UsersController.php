<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;

use App\Http\Requests\UserRequest;
class UsersController extends Controller
{
    public function signup(){
    	return view('page.vw_signup');
    }

    public function signup_store(UserRequest $request){
    	Sentinel::registerAndActivate($request);
    	Session::flash('notice','success');
    	return redirect()->back();
    }
}
