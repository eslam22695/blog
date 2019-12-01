<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
    ];

    protected $guarded = array();

    public function blog_tag($tag_id,$blog_id){
        if(\App\BlogTag::where('blog_id',$blog_id)->where('tag_id',$tag_id)->count() > 0){
            return true;
        }else{
            return false;
        }
        
    }
}
