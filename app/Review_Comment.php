<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review_Comment extends Model
{
    protected $table = 'review_comments';

    protected $fillable = [
        'review_id',
        'text',
        'author_id'
    ];

    public function review()
    {
        return $this->belongsTo('App\Review', 'review_id', 'review_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
}
