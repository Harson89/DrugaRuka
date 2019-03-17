<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public function sizes_item(){
        return $this->hasMany(sizes_item::class);
    }


   public function category(){
       return $this->belongsTo(category::class);
   }

   //connnection to ORDER_ITEMS
   public function orders_item() {
    return $this->hasMany(orders_item::class);
    }
}
