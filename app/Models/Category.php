<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

use App\Models\Brand;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'brand_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}