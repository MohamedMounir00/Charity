<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens , Notifiable;
    use SoftDeletes;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country_id','city_id','address','pesonal_id','mobile_1','mobile_2','pirthdata','level_id','office_id','level'
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at','updated_at','deleted_at'
    ];


    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function office()
    {
        return $this->belongsTo('App\Office')->withTrashed();
    }
    public function study()
    {
        return $this->belongsTo(StudyLevel::class,'level_id');
    }
}


