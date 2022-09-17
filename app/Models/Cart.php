<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $keyType = 'string';

    // protected $guarded = [];

    protected $fillable = [
        'id', 'cookie_id', 'product_id', 'user_id', 'quantity',
    ];

    // protected $hidden = [
    //     'cookie_id',
    // ];

    // auto egarloding in all cases
    protected $with = [
        'product',
    ];

    protected static function booted()
    {
        /*
        Event:
        creating, created, updating, updated, saving, saved
        deleting,deleted, restoring, restored
        */

        static::creating(function (Cart $cart) {
            $cart->id = Str::uuid();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
