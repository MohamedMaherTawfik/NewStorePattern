<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'description',
        'quantity',
        'price',
        'status',
        'marketplace_id',
        'brands_id',
        'categories_id',
    ];

    public function categories()
    {
        return $this->belongsTo(categories::class);
    }
    public function brands()
    {
        return $this->belongsTo(brands::class);
    }
    public function marketplace()
    {
        return $this->belongsTo(marketplace::class);
    }
}
