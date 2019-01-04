<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $primaryKey = 'type_id';

    public function bicycles(){
        return $this->hasMany('App\Bicycle');
    }
}
