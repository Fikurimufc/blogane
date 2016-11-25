<?php

namespace blogane;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
	protected $fillable = ['title','content','publish'];
    public static function valid(){
    	return array(
    		'content'=>'required'	
    	);
    }

    public function comments(){
    	return $this->hasMany('blogane\Comments','article_id');
    }

    public static function search($req_keyword){
    	$articles = Articles::where('title','like', '%'.$req_keyword.'%');
    	return $articles;
    }
}
