<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latest extends Model
{
    protected $table = 'latest';
    protected $fillable = [
        'latest_id',
        'name',
        'text',
        'image',
        'author',
        'status',
        'category'
    ];
}
