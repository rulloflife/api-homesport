<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public $table = "discount";

    protected $fillable = [
        'product_id',
        'namediscount',
        'desc',
        'discount_percent',
        'active',
    ];
}
