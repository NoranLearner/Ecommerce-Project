<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // For Datatables Package

    use Translatable;

    protected $table = 'categories';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */

    // For Datatables , laravel-translatable Package

    protected $with = ['translations'];

    // For Datatables , laravel-translatable Package

    protected $translatedAttributes = ['name'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'parent_id',
        'slug',
        'is_active',
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
        // return true , false
        'is_active' => 'boolean',
    ];


    // *******************  Scope ******************* //

    public function scopeParent($query){
        return $query -> whereNull('parent_id');
    }

    public function getActive(){
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function scopeChild($query){
        return $query -> whereNotNull('parent_id');
    }

    // *******************  Relationship ******************* //

}
