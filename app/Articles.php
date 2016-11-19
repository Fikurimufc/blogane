<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    public static function valid(){
    	return array(
    		'content'=>'required'	
    	);
    }

    public function comments(){
    	return $this->hasMany('App\Comment','article_id');
    }
}
