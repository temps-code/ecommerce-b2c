<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'image_path',
        'is_active',
    ];

    // Agrega la relación con Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function saleDetails() {
        return $this->hasMany(\App\Models\SaleDetail::class, 'product_id', 'id');
     }
     
}
