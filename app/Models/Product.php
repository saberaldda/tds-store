<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';

    protected $fillable = [
        'name', 'slug', 'category_id', 'image_path', 'price', 'sale_price', 'quantity', 
        'sku','weight', 'width', 'height', 'length', 'status'
    ];
    
}
