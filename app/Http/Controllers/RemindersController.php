<?php

namespace blogane\Http\Controllers;

use Illuminate\Http\Request;
use blogane\User;
use blogane\Http\Request\ReminderRequest;
use Session, Event;
use Sentinel, Reminder;
use blogane\Events\ReminderEvent;

class RemindersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reminder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getUser = User::where('email', $request->email)->first();
            if ($getUser){
                $user = Sentinel::findById($getUser->id);
                ($reminder = Reminder::exists($user)) || ($reminder = Reminder::create($user));
                Event::fire(new ReminderEvent($user, $reminder));
                Session::flash('notice','Check your email');
            }else{
                Session::flash('error','Email not valid');
            }
            return view('reminder.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $code)
    {
        $user = Sentinel::findById($id);
            if (Reminder::exists($user, $code)){
                return view('reminder.edit',compact('id','code'));
            }else{
                return redirect('/');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $code)
    {
        $user = Sentinel::findById($id);
        $reminder = Reminder::exists($user, $code);
            if ($reminder){
               Session::flash('notice', 'Your password success modified');
               Reminder::complete($user, $code, $request->password);
               return redirect('login');
            }else{
                Session::flash('error','Password must match');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
