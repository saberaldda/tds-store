<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        'type',
        'country_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'image_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // for gates and policies
    public function hasAbility($ability)
    {
        $roles = Role::whereRaw('roles.id IN (SELECT role_id FROM role_user WHERE user_id = ?)', [
            $this->id,
        ])->get();
        // SELECT * FROM roles WHERE id IN (SELECT role_id FROM role_user WHERE user_id = ?)
        // SELECT * FROM roles INNER JOIN role_user ON roles.id = role_user.role_id WHERE role_user.user_id = ?
        foreach ($roles as $role) {
            if (in_array($ability, $role->abilities)) {
                return true;
            }
        }
        return false;
    }

    public function getImageUrlAttribute()
    {
        if (!$this->profile_photo_path) {
            return asset('assets/admin/img/tds.png');
        }
        if (stripos($this->profile_photo_path, 'http') === 0) {
            return $this->profile_photo_path;
        }
        return asset('storage/' . $this->profile_photo_path);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id', 'id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id')->withDefault();
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'user_id', 'id');
    }

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id', 'id')
                    ->withDefault();
    }

    public function receivesBroadcastNotificationsOn() // change the name of broadcast channel
    {
        return 'Notifications.' . $this->id;
    }
}
