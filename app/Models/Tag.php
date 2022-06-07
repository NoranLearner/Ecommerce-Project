<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Tag extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // For laravel-translatable Package

    use Translatable;

    protected $table = 'tags';

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

    protected $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'slug',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = ['translations'];

    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //

}
