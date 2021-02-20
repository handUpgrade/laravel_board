<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $guarded=[];

    public function posts(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(Post::class);
    }
}
