<?php

namespace blogane\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use blogane\Comments, blogane\Articles;
use Illuminate\Support\Facades\Redirect;
use Session;

class CommentsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validate = Validator::make($request->all(), Comments::valid());
            if ($validate->fails()){
                return Redirect::to('article/'.$request->article_id.'/edit')->withErrors($validate)->withInput();
            }else{
                /*$comment = new Comments();
                $comment->content = $request->content;
                $comment->article_id = $request->article_id;
                $comment->user = Sentinel::getUser()->first_name;*/
                Comments::create($request->all());
                Session::flash('notice','Success and');
                return Redirect::to('article/'. $request->article_id);
                
            }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
