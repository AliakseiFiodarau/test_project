<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'article_id',
        'review_id',
        'user_id'
    ];

}
