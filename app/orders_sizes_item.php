<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders_sizes_item extends Model
{
    public function order() {
        return $this->belongsTo(order::class);
    }

    public function sizes_item() {
        return $this->belongsTo(sizes_item::class);
    }
    
}
