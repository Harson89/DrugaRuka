<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function category_subcategory(){
        return $this->hasMany(category_subcategory::class);
    }

    public function item(){
        return $this->hasMany(item::class);
    }
}
