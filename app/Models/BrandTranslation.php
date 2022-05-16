<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class BrandTranslation extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'brand_translations';

    public $timestamps = true;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $fillable = ['name'];

    // *******************  Scope ******************* //

    // *******************  Relationship ******************* //
}
