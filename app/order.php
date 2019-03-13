<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
  public function orders_sizes_item() {
      return $this->hasMany(orders_sizes_item::class);
  }

  public function User() {
    return $this->belongsTo(User::class);
}
}
