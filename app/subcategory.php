<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    public function category_subcategory(){
        return $this->hasMany(category_subcategory::class);
    }
}
