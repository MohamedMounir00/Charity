<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Delavary extends Model
{
    //
    use SoftDeletes;
    public function type()
    {
        return $this->belongsTo('App\TypeDonation', 'type_id')->withTrashed();

    }
    public function beneficiary()
    {
        return $this->belongsTo('App\Beneficiary', 'be_id')->withTrashed();

    }
    public function user_rel()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();

    }

    public function pro()
    {
        return $this->belongsTo('App\TypeDonation', 'type_id')->withTrashed();

    }
}
