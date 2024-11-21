<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// App\Models\Product.php
class Product extends Model {
    protected $fillable = ['company_id', 'name', 'description', 'price'];
    
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
