<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles, App\Comments;
use App\Http\Requests\ArticlesRequest;
use Excel;

class ArticlesController extends Controller
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
    public function store(ArticlesRequest $request)
    {
        $article = new Articles();
        $article->title     = $request->title;
        $article->content   = $request->content;
        $article->publish   = "Fikri";
        $article->save();
        /*$deb = dd($article);
        return response()->json($deb);*/
    }

    public function exportExcel($type){
         $data = Articles::find(6)->get(['title','content'])->toArray();
         return Excel::create('jambal_blog', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);

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
        $articles = Articles::find($id);
        $comments = Articles::find($id)->comments();
        // dd($comments);
       return view('page.vw_detailArticle',compact('articles','comments'));
        
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
        $articles = Articles::find($id);
        $articles->delete($id);
        return redirect()->back();
    }
}
