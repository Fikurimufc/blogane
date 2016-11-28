<?php

namespace App;

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
    	return $this->hasMany('App\Comments','article_id');
    }

    public static function search($req_keyword){
    	$articles = Articles::where('title','ilike', '%'.$req_keyword.'%');
    	return $articles;
    }
}
