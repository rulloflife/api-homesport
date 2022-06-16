<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "product";

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'brand_id',
        'size_id',
        'price',
        'desc',
    ];

    public function items()
    {
        return $this->hasOne(CartItem::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function inventory()
    {
        return $this->belongsTo(ProductInventory::class);
    }
    
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
