<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'abilities',
        
    ];

    protected $casts = [
        'abilities' => 'json',
                    // or array
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id', 'id', 'id')
                    ->withPivot([])
                    ->as('premissions')
                    // ->using(RoleUser::class)
                    ;
    }
}
