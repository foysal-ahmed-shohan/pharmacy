<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    // Mass Asignment
    protected $fillable= ['manufacturer_name', 'manufacturer_mobile', 'manufacturer_address', 'manufacturer_details', 'manufacturer_balance'];

    public function medicine(){
        return $this->hasMany('App\Medicine');
    }
    public function purchase(){
        return $this->hasMany('App\Purchase');
    }
}
