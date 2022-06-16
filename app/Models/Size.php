<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public $table = "size";

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',        
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
