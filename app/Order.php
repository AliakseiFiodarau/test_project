<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'item_id',
        'name',
        'surname',
        'email',
        'phone',
        'post_index',
        'address',
    ];
}
