<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerificationCode extends Model
{
    use HasFactory;

    protected $table = 'user_verification_codes';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'code','created_at','updated_at'];

    // *******************  Scope ******************* //


    // *******************  Relationship ******************* //

    /* public function attribute(){
        return $this -> belongsTo(Attribute::class,'attribute_id');
    } */
}
