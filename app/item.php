<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public function sizes_item(){
        return $this->hasMany(sizes_item::class);
    }

    public function category_subcategory(){
        return $this->belongsTo(category_subcategory::class);
    }
}
