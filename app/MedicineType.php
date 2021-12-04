<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineType extends Model
{
    // Mass Asignment
    protected $fillable= ['name', 'status'];

    public function medicine(){
        return $this->hasMany('App\Medicine');
    }
}
