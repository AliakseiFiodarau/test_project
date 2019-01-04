<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $primaryKey = 'review_id';
    protected $fillable = [
        'review_name',
        'review_text',
        'bicycle_id',
        'author_id',
        'rating',
        'views'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function bicycle()
    {
        return $this->belongsTo('App\Bicycle', 'bicycle_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Review_Comment', 'review_id', 'review_id');
    }
}

