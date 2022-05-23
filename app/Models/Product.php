<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Category;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // For laravel-translatable Package

    use Translatable;

    protected $table = 'products';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */

    // For laravel-translatable Package

    protected $with = ['translations'];

    // For laravel-translatable Package

    protected $translatedAttributes = ['name', 'description', 'short_description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'viewed',
        'is_active',
        'brand_id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['translations'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'manage_stock' => 'boolean',
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',  // SoftDeletes
    ];

    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }







}
