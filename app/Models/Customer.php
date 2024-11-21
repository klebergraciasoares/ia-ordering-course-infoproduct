<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// App\Models\Customer.php
class Customer extends Model {
    protected $fillable = ['company_id', 'name', 'description'];
    
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
