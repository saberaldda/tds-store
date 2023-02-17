<?php

namespace App\Models;

use App\Observers\CategoriesObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name', 'parent_id', 'description', 'slug', 'status', 'image_path'
    ];

    // will not return in api request
    protected $hidden = [
        // 'created_at', 'updated_at', 'deleted_at',
    ];

    // will return in api request (shuld be geeter)
    protected $appends = [
        'original_name',
        'image_url',
    ];

    protected static function booted()
    {
        // for solve slug dublecate (slug slug1 slug2)
        static::observe(CategoriesObserver::class);
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    // Accessors
    // Exists Attribute get{AttributeName}Attribute()
    // $model->name
    public function getNameAttribute($value)
    {
        if ($this->trashed()) {
            return $value . ' (Deleted)';
        }
        return $value;
    }

    // Non-exists Attribute
    // $model->original_name
    public function getOriginalNameAttribute()
    {
        return $this->attributes['name'];
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            return asset('assets/admin/img/tds.png');
        }
        if (stripos($this->image_path, 'http') === 0) {
            return $this->image_path;
        }

        return asset('storage/' . $this->image_path);
    }

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
                        'name' => 'No Parent',
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
