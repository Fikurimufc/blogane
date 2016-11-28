<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
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
         //$this->middleware('sentinel');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            // $req_keyword = $request->keywords;
            if ($request->keywords){
               $articles = Articles::search($request->keywords)->paginate(2);
            }else{
                $articles = Articles::paginate(2);
            }
            
            
            $view = (String)view('render._listArticles')->with('articles', $articles)
                ->render();
               return response()->json(['view'=>$view,'object'=>$articles]); 
        }else{
            $articles = Articles::paginate(2);
            return view('page.vw_articles')->with('articles', $articles);
        }
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
        $secret = '6LdV9AwUAAAAAHfTnL_P_qj-HlyfaIQBoiB38B50';
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
         $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
         if ($resp->isSuccess()){
            $article = new Articles();
            $article->title     = $request->title;
            $article->content   = $request->content;
            $article->publish   = "Fikri";
            $article->save();
         }else{
             $errors = $resp->getErrorCodes();
             Session::flash("captcha_error", $errors);
             return redirect()->back();
         }
        
        /*$deb = dd($article);
        return response()->json($deb);*/
    }

    public function exportExcel($id){
         
         $data  = Articles::select('title','content')
         ->where('id', $id)
         ->get()->toArray();
         $comment = Comments::select('content','user')
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
            $data = Excel::selectSheetsByIndex(0)->load(Input::file('import_file'), function ($reader){})->get()->toArray(); 
            $data_comment = Excel::selectSheetsByIndex(1)->load(Input::file('import_file'), function ($reader){})->get()->toArray(); 
                foreach($data as $key ){
                   $articles = new Articles();
                   $articles->title = $key['title'];
                   $articles->content = $key['content'];
                   $articles->publish = 'Fikri';
                   $articles->save(); 
                }

                foreach($data_comment as $row){
                    $comment = new Comments();
                    $comment->content = $row['content'];
                    $comment->article_id = $articles->id;
                    $comment->user = $row['user'];
                }
                return redirect()->back();
            
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
        $redis = Redis::connection();
        $articles = Articles::find($id);
        $redis->get($articles);
        $comments = Articles::find($id)->comments;

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
