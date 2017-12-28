<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = ['id'];

    const STORE_RULES = [
        'title' => 'required',
        'body' => 'required | min:15'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function getPublishedPosts()
    {
        return self::where('published', true)->get();
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
