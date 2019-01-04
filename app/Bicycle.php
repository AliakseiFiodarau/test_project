<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    protected $table = 'bicycle_shop_main';
    public function type(){
        return $this->belongsTo('App\Type', 'type_id', 'type_id');
    }

    public function brand(){
        return $this->belongsTo('App\Brand', 'brand_id', 'brand_id');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }
}
