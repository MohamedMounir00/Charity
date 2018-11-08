<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name', 'price', 'office_id', 'cat_id', 'date', 'payment_method', 'user_id'
    ];

    public function offices_rel()
    {
        return $this->belongsTo('App\Office', 'office_id')->with('city')->withTrashed();

    }

    public function cat_rel()
    {
        return $this->belongsTo('App\Catogrey', 'cat_id')->withTrashed();

    }

    public function type()
    {
        return $this->belongsTo('App\TypeDonation', 'type_id')->withTrashed();

    }

    public function user_rel()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();

    }
}
