<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
    public function order_lines(){
    	return $this->hasMany('App\OrderLine');
    }
}
