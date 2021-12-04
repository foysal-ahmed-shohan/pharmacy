<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    // Mass Asignment
    protected $fillable= [
        'product_name',
        'generic_name',
        'box_size',
        'unit_id',
        'shelf',
        'details',
        'type_id',
        'images',
        'cat_id',
        'sell_price',
        'vat',
        'tax',
        'igst',
        'barcode',
        'manufacturer_id',
        'manufacturer_price',
        'status'
    ];

    public function type()
    {
        return $this->belongsTo('App\MedicineType');
    }
    public function unit()
    {
        return $this->belongsTo('App\MedicineUnit');
    }
    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

   

    //

    public function salesinfo()
    {
        return $this->hasMany('App\Salesinfo');
    }
    // 


    public function purchaseinfo()
    {
        return $this->hasMany('App\Purchaseinfo');
    }
}
