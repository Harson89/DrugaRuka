<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    public function orders_article() {
        return $this->hasMany(orders_article::class);
    }

    public function User() {
      return $this->belongsTo(User::class);
  }

    //connnection to ORDER_ITEMS
    public function orders_item() {
    return $this->hasMany(orders_item::class);
    }

}
