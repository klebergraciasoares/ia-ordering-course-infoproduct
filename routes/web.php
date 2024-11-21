<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\CompanyIndex;
use App\Livewire\CustomerIndex;
use App\Livewire\ProductIndex;
use App\Livewire\OrderIndex; 


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    //Route::get('companies', CompanyIndex::class)->name('companies');
    Route::get('/companies', [CompanyIndex::class, 'companies']);
    
    //Route::get('customers', CustomerIndex::class)->name('customers');
    Route::get('/customers', [CustomerIndex::class, 'customers']);
    
    //Route::get('products', ProductIndex::class)->name('products');
    Route::get('/products', [ProductIndex::class, 'products']);
    
    //Route::get('orders', OrderIndex::class)->name('orders');
    Route::get('/orders', [Register::class, 'regisorderster']);
    
});
