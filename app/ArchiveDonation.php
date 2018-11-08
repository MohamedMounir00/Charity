<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArchiveDonation extends Model
{
    //
    use SoftDeletes;
    public function offices_rel()
    {
        return $this->belongsTo('App\Office', 'office_id')->with('city')->withTrashed();

    }

    public function cat_rel()
    {
        return $this->belongsTo('App\Catogrey', 'cat_id')->withTrashed();

    }



    public function user_rel()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();

    }
}
