<?php

namespace blogane;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

	protected $fillable = ['content','article_id','user'];
    public static function valid(){
    	return array(
    		'content' => 'required'
    	);
    }

    public function article(){
    	return $this->belongsTo('blogane\Articles','id');
    }
}
