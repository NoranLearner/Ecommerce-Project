<?php

namespace App\Models;

use App\Models\MainCategory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'sub_categories';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'category_id',
        'translation_lang',
        'translation_of',
        'name',
        'slug',
        'photo',
        'active',
        'created_at',
        'updated_at'
    ];

    // *******************  For Observer ******************* //

    // *******************  Scope ******************* //

    // Get Active Languages
    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function scopeSelection($query){
        return $query -> select('id','parent_id','category_id', 'translation_lang', 'translation_of', 'name', 'slug', 'photo', 'active');
    }

    // For get photo from DB
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";
    }

    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    // *******************  Relationship ******************* //

    // get all translation categories

    public function categories()
    {
        return $this->hasMany(self::class, 'translation_of');
    }

    public function vendors(){
        return $this -> hasMany('App\Models\Vendor','category_id','id');
    }

    //get main category of subcategory
    public function mainCategory(){
        return $this -> belongsTo(MainCategory::class,'category_id','id');
    }



}
