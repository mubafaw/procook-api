<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'product_name',
        'product_desc',
        'product_category',
        'product_price',
    ];
}
