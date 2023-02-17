<?php

namespace App\Models;

use App\Notifications\LowQuantityNotification;
use App\Observers\ProductsObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use NumberFormatter;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT  = 'draft';

    protected $fillable = [
        'name', 'slug', 'category_id', 'description', 'image_path', 'price', 'sale_price', 'quantity', 
        'sku','weight', 'width', 'height', 'length', 'status', 'user_id',
    ];

    protected $casts = [
        'price' => 'float',
        'quantity' => 'int'
    ];

    protected $appends = [
        'image_url',
        'formatted_price',
        'permalink'
    ];

    protected static function booted()
    {
        // for solve slug dublecate (slug slug1 slug2)
        static::observe(ProductsObserver::class);

        // Notification For Low Quantity
        self::saved(function(Product $product) {
            if ($product->quantity <= 5) {
                $users = User::where('type', 'super-admin')->orWhere('id', $product->user->id)->get();
                Notification::send($users, new LowQuantityNotification($product));
            }
        });
    }

    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }

    public function scopeActiveCategory(Builder $builder)
    {
        $builder->wherehas('category', function($query){
            $query->where('status', 'active');
        });
    }

    public function scopePrice(Builder $builder,$from,$to)
    {
        $builder->where('price', '>=', $from)
                ->where('price', '<=', $to);
    }

    // Accessors:   get{AttributeName}Attribute()
    // image_url
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

    // Mutators:    set{AttributeName}Attribute()
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Str::title($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getFormattedPriceAttribute()
    {
        $formatter = new NumberFormatter(App::getLocale(), NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($this->price, 'USD');
    }

    public function getPermalinkAttribute()
    {
        return route('product.details', $this->slug);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
                    ->withDefault();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')
                    ->withDefault();
    }

    public function ratings() 
    {
        return $this->morphMany(Rating::class, 'rateable', 'rateable_type', 'rateable_id', 'id');
    }

}
