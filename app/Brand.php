<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $primaryKey = 'brand_id';

    public function bicycles(){
        return $this->hasMany('App\Bicycle');
    }
}
