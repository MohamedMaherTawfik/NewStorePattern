<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brands extends Model
{
    public $table = "brands";
    protected $fillable = [
        'name',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(products::class);
    }
}
