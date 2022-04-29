<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'vendors';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'address',
        'logo',
        'category_id',
        'active',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'category_id',
    ];

// *******************  Scope ******************* //

    // Get Active Languages
    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function scopeSelection($query){
        return $query -> select('id','category_id', 'name', 'logo', 'mobile', 'active', 'email', 'address');
    }

    // For get photo from DB
    public function getLogoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";
    }

    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

// *******************  Relationship ******************* //

    public function category()
    {
        return $this->belongsTo('App\Models\MainCategory', 'category_id', 'id');
    }



}
