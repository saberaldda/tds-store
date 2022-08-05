<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $hidden = [  // will not return in api request
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [  // will return in api request (shuld be geeter)
        'original_name',
    ];

    protected static function booted()
    {
        static::creating(function (Category $category) {
            $category->slug = Str::slug($category->name);
        });
    }
    
    // Accessors
    // Exists Attribute get{AttributeName}Attribute()
    // $model->name
    // public function getNameAttribute($value)
    // {
    //     if ($this->trashed()) {
    //         return $value . ' (Deleted)';
    //     }
    //     return $value;
    // }

    // Non-exists Attribute
    // $model->original_name
    // public function getOriginalNameAttribute()
    // {
    //     return $this->attributes['name'];
    // }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }


    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')
                    ->withDefault([
                        'name' => 'Not Parent',
                    ]);
    }

    /*public function toJson($options = 0)
    {
        return json_encode([
            'id' => $this->id,
            'name' => $this->name,
        ]);
    }*/
}
