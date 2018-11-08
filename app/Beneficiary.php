<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    //

    use SoftDeletes;
    public function user_rel()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();

    }
}
