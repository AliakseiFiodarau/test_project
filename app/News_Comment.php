<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_Comment extends Model
{
    protected $table = 'news_comments';
    protected $fillable = [
        'news_id',
        'text',
        'author_id',
        'rating'
    ];

    public function news()
    {
        return $this->belongsTo('App\News', 'news_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
}
