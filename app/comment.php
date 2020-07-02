<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //

    protected $fillable = [
        'post_id',
        'author',
        'email',
        'body',
        'photo',
        'is_active'
    ];
    public function replies()
    {
        return $this->hasMany('App\commentReply');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
