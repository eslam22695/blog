<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = [
        'blog_id', 'tag_id',
    ];

    protected $guarded = array();
    
    public function blog()
    {
        return $this->belongsTo('App\Blog','blog_id');
    }
    
    public function tag()
    {
        return $this->belongsTo('App\Tag','tag_id');
    }
}
