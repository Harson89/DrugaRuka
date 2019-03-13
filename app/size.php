<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{

    public function sizes_item(){
        return $this->hasMany(sizes_item::class);
    }

}
