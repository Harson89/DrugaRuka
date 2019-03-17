<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders_item extends Model
{
    //connection to ITEMS
    public function item(){
        return $this->belongsTo(item::class);
    }

    //connection to ORDERS
    public function order(){
        return $this->belongsTo(order::class);
    }

}
