<?php

namespace App\Models;

use App\Models\SubCategory;
use Laravel\Sanctum\HasApiTokens;
use App\Observers\MainCategoryObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainCategory extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'main_categories';

    public $timestamps = true;

    // protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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

    protected static function boot()
    {
        parent::boot();
        MainCategory::observe(MainCategoryObserver::class);
    }

// *******************  Scope ******************* //

    // Get Active Languages
    public function scopeActive($query){
        return $query -> where('active',1);
    }

    public function scopeSelection($query){
        return $query -> select('id', 'translation_lang', 'translation_of', 'name', 'slug', 'photo', 'active');
    }

    // For get photo from DB
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";
    }

    public function getActive(){
        return $this->active == 1 ? 'مفعل' : 'غير مفعل';
    }

    public function scopeDefaultCategory($query){
        return  $query -> where('translation_of',0);
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

    public function subCategories(){
        return $this -> hasMany(SubCategory::class,'category_id','id');
    }



}
