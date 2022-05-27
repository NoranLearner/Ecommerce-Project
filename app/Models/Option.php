<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Attribute;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // For laravel-translatable Package

    use Translatable;

    protected $table = 'options';

    public $timestamps = true;

    protected $guarded = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */

    // For laravel-translatable Package

    protected $with = ['translations'];

    // For laravel-translatable Package

    protected $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['attribute_id', 'product_id','price'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['translations'];

    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function attribute(){
        return $this -> belongsTo(Attribute::class,'attribute_id');
    }
}
