<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;

    public $table = "product_inventory";

    protected $fillable = [
        'quantity',
        'product_id'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
