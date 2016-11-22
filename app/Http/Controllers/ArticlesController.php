<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
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
    public function __construct(){
        // $this->middleware('sentinel');
    }

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

    public function exportExcel($id){
         
         $data  = Articles::select('title','content')
         ->where('id', $id)
         ->get()->toArray();
         $comment = Comments::select('content')
         ->where('article_id', $id)->get()->toArray();
         //dd($data, $comment);
         return Excel::create('jambal_blog', function($excel) use ($data, $comment) {
            $excel->sheet('tessss', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
              $excel->sheet('comment', function($sheet) use ($comment) {
                $sheet->fromArray($comment);
              });
        })->download('xls');

    }

    public function import(Request $request){
        

        if(!Input::hasFile($request->file('import_file'))){
            $data = Excel::load(Input::file('import_file')->getRealPath(), function ($reader){})->get(); 
            if(!empty($data) && $data->count()){
                foreach($data as $key =>$value){
                    $insert[] = ['title'    => $value->title,
                                 'content'  => $value->content,
                                 'publish'  =>  'fikri'   
                                ];
                }
                if(!empty($insert)){
                    DB::table('articles')->insert($insert);
                    dd('success');
                }
            }//close if
        }//close if input
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $articles = Articles::find($id);
        $comments = Articles::find($id)->comments;
        // dd($comments);
       return view('page.vw_detailArticle',compact('articles','comments'));
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
       return view('page.vw_edit', compact('articles'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $request, $id)
    {
      
        $articles = Articles::find($id);
        $articles->title    = $request->title;
        $articles->content = $request->content;
        $articles->publish = "Fikri";
        $articles->save();
        return redirect()->back();
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
