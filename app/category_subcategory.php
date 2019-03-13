<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_subcategory extends Model
{
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function subcategory(){
        return $this->belongsTo(subcategory::class);
    }

    public function item(){
        return $this->hasMany(item::class);
    }

}
