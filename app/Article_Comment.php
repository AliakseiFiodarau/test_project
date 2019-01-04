<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_Comment extends Model
{
    protected $table = 'article_comments';

    protected $fillable = [
        'article_id',
        'text',
        'author_id'
    ];

    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id', 'article_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
}



