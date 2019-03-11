<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class support extends Model
{
    public function User(){
        return $this->belongsTo(User::class);
    }
}
