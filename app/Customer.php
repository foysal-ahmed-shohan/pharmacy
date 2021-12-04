<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Mass Asignment
    protected $fillable= ['customer_name', 'customer_email', 'customer_phone', 'customer_address', 'customer_balance'];

    
}
