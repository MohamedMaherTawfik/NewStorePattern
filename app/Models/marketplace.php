<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class marketplace extends Model
{
    protected $table = 'marketplaces';
    protected $fillable = [
        'name',
        'image',
        'address'
    ];

    public function products()
    {
        return $this->hasMany(products::class);
    }
}
