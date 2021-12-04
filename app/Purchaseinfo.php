<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaseinfo extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function purchase()
    {
        return $this->belongsTo('App\Purchase');
    }

     public function medicine()
    {
        return $this->belongsTo('App\Medicine');
    }

}
