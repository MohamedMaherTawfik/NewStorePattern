<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart_products extends Model
{
    protected $table = 'cart_products';
    protected $fillable = [
        'cart_id',
        'products_id',
    ];

    public function cart()
    {
        return $this->belongsTo(cart::class, 'cart_id');
    }
    public function products()
    {
        return $this->belongsTo(products::class, 'products_id');
    }
}
