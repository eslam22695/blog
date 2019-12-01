<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'image', 'title', 'description','content','editor_id',
    ];

    protected $guarded = array();

    public function editor()
    {
        return $this->belongsTo('App\Admin','editor_id');
    }

    public function comment_count(){
        return \App\Comment::where('blog_id',$this->id)->count();
    }

    public function comments(){
        return \App\Comment::where('blog_id',$this->id)->orderBy('id','desc')->get();
    }
}
