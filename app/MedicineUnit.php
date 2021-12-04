<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineUnit extends Model
{
    // Mass Asignment
    protected $fillable= ['name', 'status'];

    public function medicine(){
        return $this->hasMany('App\Medicine');
    }
}
