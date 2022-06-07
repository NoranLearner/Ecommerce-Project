<?php

namespace App\Models;

use App\Models\Option;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // For laravel-translatable Package

    use Translatable;

    protected $table = 'attributes';

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
     * @var array<int, string>
     */

    // protected $fillable = [];

    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //

    public  function options(){
        return $this->hasMany(Option::class,'attribute_id');
    }
}
