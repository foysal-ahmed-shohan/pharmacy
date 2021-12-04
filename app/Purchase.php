<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }
    public function medicine()
    {
        return $this->hasMany('App\Medicine');
    }
    public function purchaseinfo()
    {
        return $this->hasMany('App\Purchaseinfo');
    }
}
