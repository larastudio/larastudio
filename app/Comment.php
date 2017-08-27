<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //https://laravel.com/docs/5.4/eloquent#mass-assignment
    protected $fillable = [
    'body'
    ];

    public function post ()
    {
        return $this->belongsTo(Post::class);
    }
}
