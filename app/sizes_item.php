<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sizes_item extends Model
{

    public function size(){
        return $this->belongsTo(size::class);
    }

    public function item(){
        return $this->belongsTo(item::class);
    }

}
