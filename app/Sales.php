<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function salesinfo()
    {
        return $this->hasMany('App\Salesinfo');
    }
    public function company()
    {
        return $this->hasMany('App\Company');
    }


       public function medicines()
    {
        return $this->hasMany('App\Medicine');
    }
}
