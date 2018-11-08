<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resignation extends Model
{
    //

    use SoftDeletes;


    public function user_rel(){
        return $this->belongsTo('App\User', 'user_id')->withTrashed();

    }

    public function offices_rel()
    {
        return $this->belongsTo('App\Office', 'office_id')->withTrashed();

    }
}
