<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'address', 'birthdate', 'gender'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')
                    ->withDefault();
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable', 'rateable_type', 'rateable_id', 'id');
    }
}
