<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Brand extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // For laravel-translatable Package

    use Translatable;

    protected $table = 'brands';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */

    // For laravel-translatable Package

    protected $with = ['translations'];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */

    // For Datatables , laravel-translatable Package

    public $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['photo', 'is_active'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */

    // protected $hidden = ['translations'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        // return true , false
        'is_active' => 'boolean',
    ];

    // *******************  Scope ******************* //

    public function scopeActive($query){
        return $query -> where('active',1);
    }

    // *******************  Relationship ******************* //

    public function getActive(){
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
    }

    // For get photo from DB
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/images/brands/' . $val) : "";
    }

}
