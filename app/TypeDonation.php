<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class TypeDonation extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];
}
