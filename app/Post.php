<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    'title',
    'body'
    ];

    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }
    public function addComment ($body) 
    {
        // $his->comments()->create()
        // $this pseudo-variable http://php.net/manual/en/language.oop5.basic.php
        // http://stackoverflow.com/questions/1523479/what-does-the-variable-this-mean-in-php#1523484
        // reference to the current object, it's most commonly used in object oriented code
        $this->comments()->create(compact('body'));
    }
}
