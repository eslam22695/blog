<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment', 'blog_id', 'user_id','admin_id',
    ];

    protected $guarded = array();

    public function blog()
    {
        return $this->belongsTo('App\Blog','blog_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin','admin_id');
    }
}
