<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesinfo extends Model
{
    // Mass Asignment
    protected $guarded = [];

    public function sales()
    {
        return $this->belongsTo('App\Sales');
    }
    public function medicine()
    {
        return $this->belongsTo('App\Medicine');
    }
}
