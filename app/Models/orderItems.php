<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        'orders_id',
        'products_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(orders::class);
    }

    public function product()
    {
        return $this->belongsTo(products::class);
    }

}
