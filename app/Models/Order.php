<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// App\Models\Order.php
class Order extends Model {
    protected $fillable = ['company_id', 'customer_id', 'subtotal', 'total'];
    
    public function company() {
        return $this->belongsTo(Company::class);
    }
    
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}