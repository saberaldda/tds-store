<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function users()
    {
        return $this->hasMany(User::class, 'country_id', 'id');
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, User::class, 'country_id', 'user_id', 'id', 'id');
    }
}
