<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use SoftDeletes;


    public function user_rel(){
        return $this->belongsTo('App\User', 'user_id')->withTrashed();

    }
}
