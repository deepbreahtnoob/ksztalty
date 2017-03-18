<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
	public function order()
    {
        return $this->belongsTo('App\Order');
    }

	public function shape()
    {
        return $this->belongsTo('App\Shape');
    }
}
