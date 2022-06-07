<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'photo', 'created_at', 'updated_at'];

    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //

    public function getPhotoAttribute($val)
    {

        return $val ? asset('assets/images/products/'.$val) : '';
    }

}
