<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'address','country_id','city_id'
    ];
    //
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function users_rel(){

        return $this->hasMany('App\User');
    }
}
